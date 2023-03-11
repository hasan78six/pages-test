import datatable from '../table/table.vue';
import modal from '../modal/modal.vue';

export default {
    components:{
        datatable,
        modal
    },
    data() {
        return {
            modal_name: 'page-modal',
            url:'http://127.0.0.1:8000/api/pages'
        }
    }
}
