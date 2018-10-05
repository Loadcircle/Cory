var path_url = window.location.pathname;

if(path_url == "/admin/locales"){
  var local_instance =  new Vue({
        el: '#local',
        created: function(){
            this.getlocals();
        },
        data: {
            tittle: 'Administrar Locales',
            locals: [],
            paginate: {
                'total': 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to': 0,
            },
            newLocal: '',
            fillLocal: {'id': '', 'name': ''},
            errors: [],
            offset: 3, //variable para el paginador
        },
        computed: {
            isActived: function(){
                return this.paginate.current_page;
            },
            pagesNumber: function(){
                if(!this.paginate.to){
                    return [];
                }

                var from = this.paginate.current_page - this.offset;
                if(from < 1){
                    from = 1;
                }

                var to = from + (this.offset * 2 );
                if(to >= this.paginate.last_page){
                   to = this.paginate.last_page;
                }

                var pagesArray = [];
                while(from <= to){
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods: {
            getlocals: function(page){
                var urlNames = '/admin/local?page=' + page;
                axios.get(urlNames).then(response => {
                    this.locals = response.data.locals.data,
                    this.paginate = response.data.paginate
                });
            },
            deleteLocal: function(local){
                var url = '/admin/local/' + local.id;
                axios.delete(url).then(response => {
                    this.getlocals();
                    toastr.success('Eliminado correctamente');
                })
            },
            createLocal: function(){
                var url = '/admin/local';
                axios.post(url, {
                    name: this.newLocal
                }).then(response => {
                    this.getlocals();
                    this.newLocal = '';
                    this.errors = [];
                    $('#create').modal('hide');
                    toastr.success('Creado correctamente');
                }).catch(error => {
                    this.errors = error.response.data
                });
            },
            editLocal: function(local){
                this.fillLocal.id = local.id;
                this.fillLocal.name = local.name;
                $('#edit').modal('show');
            },
            updateLocal: function(id){
                var url = '/admin/local/' + id;
                axios.put(url, this.fillLocal).then(response => {
                    this.getlocals();
                    this.fillLocal = {'id': '', 'name': ''};
                    this.errors = [];
                    $('#edit').modal('hide');
                    toastr.success('Actualizado correctamente');
                }).catch(error => {
                    this.errors = error.response.data;
                });
            },
            changePage: function(page){
                this.paginate.current_page = page;
                this.getlocals(page);
            }

        }
    });
}
if(path_url == "/admin/tickets"){

var local_instance = new Vue({
        el: '#ticket',
        created: function(){
            this.getTickets();
        },
        data: {
            tittle: 'Administrar Boletas',
            tickets: [],
            paginate: {
                'total': 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to': 0,
            },
        },
        computed: {
            isActived: function(){
                return this.paginate.current_page;
            },
            pagesNumber: function(){
                if(!this.paginate.to){
                    return [];
                }

                var from = this.paginate.current_page - this.offset;
                if(from < 1){
                    from = 1;
                }

                var to = from + (this.offset * 2 );
                if(to >= this.paginate.last_page){
                   to = this.paginate.last_page;
                }

                var pagesArray = [];
                while(from <= to){
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods: {
            getTickets: function(page){
                var url = '/admin/ticket?page=' + page;
                axios.get(url).then(response => {
                    this.tickets = response.data.tickets.data,
                    this.paginate = response.data.paginate
                });
            },
            changePage: function(page){
                this.paginate.current_page = page;
                this.getTickets(page);
            }
        },
    });

}

