/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const page = new Vue({
    el: '#page',
    data: {
        isHidden: true,
        cargo: {
            from: '',
            to: '',
            name: '',
            weight: '',
            isOpen: true
        },
        cargos: [],
        errors: [],
        count: 0
    },
    mounted: function () {
        this.getAllCargos()
    },
    methods: {
        showModal: function () {
            this.isHidden = false
        },
        hideModal: function () {
            this.isHidden = true
        },
        createCargo: function (event) {
            event.preventDefault()
            this.hideErrors()

            axios({
                method: 'post',
                url: '/api/cargo',
                data: this.cargo
            }).then(this.successCreateRequest)
                .catch(this.errorRequest)
        },
        successCreateRequest: function (response) {
            let cargos =  []

            this.cargo.from = ''
            this.cargo.to = ''
            this.cargo.name = ''
            this.cargo.weight = ''

            this.$set(response.data.data, 'isOpen', true)
            cargos.push(response.data.data)

            $(this.cargos).each((i,cargo) => {
                this.$set(cargo, 'isOpen', false)
                cargos.push(cargo)
            })

            this.cargos = cargos
            this.setCount()
            this.hideModal()
        },
        errorRequest: function(error){
            $(Object.keys(error.response.data.errors)).each((i,field) => {
                this.errors.push(field +' : '+ error.response.data.errors[field].join(' , '))
            })
        },
        getAllCargos: function () {
            axios.get('/api/cargo')
                .then(response => {
                    $(response.data.data).each((i,cargo) => {
                        this.$set(cargo, 'isOpen', !i )
                        this.cargos.push(cargo)
                    })
                    this.setCount()
                })
        },
        setCount: function () {
            this.count = this.cargos.length
        },
        openMap: function (id) {
            $(this.cargos).each((i,cargo) => {
                this.$set(cargo,'isOpen', (cargo.id === id))
            })
        },
        hideErrors: function () {
            this.errors = []
        }
    }
})
