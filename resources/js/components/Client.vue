<template>
	<div class="card">
		<div class="card-header">{{ title }}</div>
		<div class="card-body">
			<div v-if="!client">Данные не загружены</div>
			<div v-else>
                <div class="row">
                    <div class="col-md-3">ID</div>
                    <div class="col-md-9">{{ client.id }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">Имя</div>
                    <div class="col-md-9">{{ client.name }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">Фамилия</div>
                    <div class="col-md-9">{{ client.surname }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">Почтовые ящики</div>
                    <div class="col-md-9">{{ client.emails.join(', ') }}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">Телефоны</div>
                    <div class="col-md-9">{{ client.phones.join(', ') }}</div>
                </div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    data() {
        return {
            client: null
        }
    },
    mounted() {
        this.getClient()
    },
    methods: {
        getClient() {
            axios.get(`/api/clients/${this.$route.params.id}`)
                .then(response => {
                    this.client = response.data.data
                })
                .catch(error => {
					console.log(error)
				})
        }
    },
    props: {
        title: {
            type: String,
            required: true
        }
    }
}
</script>
