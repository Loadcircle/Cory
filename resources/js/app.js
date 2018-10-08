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

var ticket_instance = new Vue({
        el: '#ticket',
        created: function(){
            this.getTickets();
        },
        data: {
            tittle: 'Administrar Boletas',
            active: true,
            loader: true,
            tickets: [],
            paginate: {
                'total': 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to': 0,
            },
            offset: 3, //variable para el paginador
            errors: [],
            FillConsume: {'id': '', 'consume': '', 'ticket_number' : ''},
            results: '',
            locals: [],
            total_consume: '',
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
            getTickets: function(page, results = 2){
                var url = '/admin/ticket/' + results +'?page=' + page;
                axios.get(url).then(response => {
                    this.tickets = response.data.tickets.data,
                    this.paginate = response.data.paginate,
                    this.locals = response.data.local,
                    this.total_consume = response.data.total_consume,
                    this.loader = false
                });
            },
            changePage: function(page){
                this.loader = true;
                this.paginate.current_page = page;
                this.getTickets(page);
            },
            MaxResults: function(results){
                this.loader = true;
                this.getTickets(1, results);
            },
            EmailFilter: function(email){
                var url = '/admin/ticketE/' + email;
                this.loader = true;
                axios.get(url).then(response => {
                    this.tickets = response.data.tickets.data,
                    this.paginate = response.data.paginate,
                    this.locals = response.data.local,
                    this.total_consume = response.data.total_consume,
                    this.loader = false
                });
            },
            RutFilter: function(rut){
                var url = '/admin/ticketR/' + rut;
                this.loader = true;
                axios.get(url).then(response => {
                    this.tickets = response.data.tickets.data,
                    this.paginate = response.data.paginate,
                    this.locals = response.data.local,
                    this.total_consume = response.data.total_consume,
                    this.loader = false
                });
            },
            Local: function(id){
                var url = '/admin/ticketL/' + id;
                this.loader = true;
                axios.get(url).then(response => {
                    this.tickets = response.data.tickets.data,
                    this.paginate = response.data.paginate,
                    this.locals = response.data.local,
                    this.total_consume = response.data.total_consume,
                    this.loader = false
                });
            },
            EditConsume: function(ticket){
                this.FillConsume.id = ticket.id;
                this.FillConsume.consume = ticket.consume;
                this.FillConsume.ticket_number = ticket.ticket_number;
                $('#edit').modal('show');
            },
            Consume: function(id){
                this.loader = true;
                var url = '/admin/ticketC/' + id;
                axios.put(url, this.FillConsume).then(response => {
                    this.loader = false
                    this.MaxResults(0);
                    this.FillConsume = {'id': '', 'consume': ''};
                    this.errors = [];
                    $('#edit').modal('hide');
                    toastr.success('Actualizado correctamente');
                }).catch(error => {
                    this.errors = error.response.data;
                });
            },
            goCounter: function(){
                ticket_instance2.active = true;
                this.active = false;
            }
        },
    });


    var ticket_instance2 = new Vue({
        el: '#counter',
        created: function(){
            this.getCounter();
        },
        data: {
            tittle: 'Top Boletas',
            active: false,
            counters: [],
            loader: true,
        },
        methods:{
            getCounter: function(){
                var url = '/admin/ticketT';
                axios.get(url).then(response => {
                    this.counters = response.data,
                    this.loader = false
                });
            },
            GoRut: function(rut){
                ticket_instance.RutFilter(rut);
                this.GoTickets();
            },
            GoTickets: function(){
                ticket_instance.active = true;
                this.active = false;
            }
        }
    })

}
