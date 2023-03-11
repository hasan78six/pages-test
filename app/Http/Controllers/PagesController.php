<?php

namespace App\Http\Controllers;

use App\Common\Utils;
use App\Models\Pages;
use Illuminate\Http\Request;
use Exception;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PagesController extends Controller
{
    // Setting up validation rules for api
    private $rules = [
        'parent_id' => ["nullable", "integer"],
        'slug' => ["required", 'string', 'max:30'],
        "title" => ["required", 'string', 'max:50'],
        "content" => ["required", 'string']
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pages = Pages::with("parent")->get();

            return [
                "status" => 200,
                "data" => $pages
            ];
        } catch (Exception $ex) {
            return [
                "status" => 500,
                "message" => $ex->getMessage()
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->rules["parent_id"][] = "not_in:" . Pages::getNextRecordId();

            $request->validate($this->rules);

            $page = Pages::create($request->all());

            return [
                "status" => 200,
                "data" => $page,
                "message" => "Page created successfully"
            ];
        } catch (Exception $ex) {
            return [
                "status" => 500,
                "message" => $ex->getMessage()
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $page)
    {
        try {
            return [
                "status" => 200,
                "data" => $page
            ];
        } catch (Exception $ex) {
            return [
                "status" => 500,
                "message" => $ex->getMessage()
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pages $page)
    {
        try {
            $this->rules["parent_id"][] = "not_in:" . $page->id;

            $request->validate($this->rules);

            $page->update($request->all());

            return [
                "status" => 200,
                "data" => $page,
                "message" => "Page updated successfully."
            ];
        } catch (Exception $ex) {
            return [
                "status" => 500,
                "message" => $ex->getMessage()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $page)
    {
        try {
            $page->delete();

            return [
                "status" => 200,
                "data" => $page,
                "msg" => "Page deleted successfully."
            ];
        } catch (Exception $ex) {
            return [
                "status" => 500,
                "message" => "Children of this parent page has to be deleted first."
            ];
        }
    }

    /**
     * Fetch pages dynamically
     *
     * @param string $slug
     * @return View
     */
    public function page($slug = null)
    {
        try {
            // array of columns which needs to be fetched
            $columns = ["id", "parent_id", "slug", "title", "content"];

            // Filter empty value and trim values from url
            $segments = array_filter(array_map('trim', explode("/", $slug)));

            // Counting Segments
            $count = count($segments);

            // Setting new variable
            $data = null;

            // Switch case according number of segments
            switch (true) {
                case $count == 0:
                    // if home page is requested
                    $data = Pages::select($columns)->where('parent_id', null)->where('priority', 1)->first();
                    break;
                case $count == 1:
                    // if any of the parent page is requested
                    $data = Pages::select($columns)->where('slug', $segments[0])->where('parent_id', null)->first();
                    break;
                case $count > 1:
                    // Any of the child pages is requested
                    $data = Pages::select($columns)->where('slug', $segments[$count - 1])
                        ->where('parent_id', '!=', null)->with("parent")->get();

                    // Counting record fetch from database
                    $records = count($data);

                    // Below is the logic to validate url and also as mentioned in task slug cant be unique so I have handled it here
                    switch (true) {
                        case $records === 1:
                            $data = $data[0]->toArray();
                            $slugs = Utils::getSegments($data);

                            if (implode("/", $slugs) === $slug) {
                                unset($data["parent"]);
                            } else {
                                $data = null;
                            }
                            break;
                        case $records > 1:
                            foreach ($data as $v) {
                                $v = $v->toArray($v);
                                $slugs = Utils::getSegments($v);

                                if (count($slugs) === $count) {
                                    if (implode("/", $slugs) === $slug) {
                                        $data = $v;
                                        unset($data["parent"]);
                                        break;
                                    } else {
                                        $data = null;
                                    }
                                } else {
                                    $data = null;
                                }
                            }
                            break;
                        default:
                            $data = null;
                            break;
                    }
                    break;
            }

            // Returning page if there is data
            if (!empty($data)) {
                return view("pages", is_array($data) ? $data : $data->toArray());
            } else {
                abort(404);
            }
        } catch (NotFoundHttpException $ex) {
            abort(404);
        } catch (Exception $ex) {
            abort(500);
        }
    }
}
