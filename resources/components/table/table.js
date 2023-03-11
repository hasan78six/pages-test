import customButton from '../button/button.vue';
import axios from "axios";

export default {

    props: {
        url: String
    },
    components: {
        customButton
    },
    mounted() {
        this.getUsers();
    },
    data() {
        return {
            tableData: null,
        }
    },
    methods: {
        getUsers: function () {
            var config = {
                method: 'get',
                url: this.url,
                headers: {}
            };

            axios(config)
                .then((response) => {
                    this.tableData = response.data.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
