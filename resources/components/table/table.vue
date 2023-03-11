<template>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Pages</h6>
                </div>
                <div class="col-6 text-end">
                    <customButton><i class="fas fa-plus-square"></i> Add Page</customButton>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Title
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            Content
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Slug
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Parent
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Parent Slug
                        </th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="dt in tableData" :key="dt.id">
                        <td>
                            <p class="text-xs font-weight-bold mb-0" style="padding-left: 15px;">{{dt.title}}</p>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{dt.content}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs text-secondary mb-0">{{dt.slug}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs text-secondary mb-0">{{ dt.parent ? dt.parent.title : 'N/A'}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p class="text-xs text-secondary mb-0">{{ dt.parent ? dt.parent.slug : 'N/A'}}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript" src="./table.js"></script>
