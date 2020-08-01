<template>
	<div class="card">
		<div class="card-header">{{ title }}</div>
		<div class="card-body">
			<div v-if="!clients" class="text-danger">Данные не загружены</div>
			<div v-else>
				<form class="form-row" @submit.prevent="getClients">
					<div class="col">
						<input type="text" class="form-control" v-model.trim="filters.name" placeholder="Имя">
					</div>
					<div class="col">
						<input type="text" class="form-control" v-model.trim="filters.surname" placeholder="Фамилия">
					</div>
					<div class="col">
						<input type="text" class="form-control" v-model.trim="filters.email" placeholder="E-mail">
					</div>
					<div class="col">
						<input type="text" class="form-control" v-model.trim="filters.phone" placeholder="Телефон">
					</div>
					<div class="col text-right">
						<button type="submit" class="btn btn-success">Найти</button>
					</div>
				</form>
				<table class="table table-striped mt-3">
					<thead>
						<th>ID</th>
						<th>Имя</th>
						<th>Фамилия</th>
						<th></th>
					</thead>
					<tbody>
						<tr v-for="client of clients" v-bind:key="client.id">
							<td class="table-text">
								{{ client.id }}
							</td>
							<td class="table-text">
								{{ client.name }}
							</td>
							<td class="table-text">
								{{ client.surname }}
							</td>
							<td class="table-text text-right">
								<router-link :to="{ name: 'editClient', params: { id: client.id } }">
									<i class="fa fa-edit"></i>
								</router-link>
								
								<router-link :to="{ name: 'showClient', params: { id: client.id } }" class="ml-3">
									<i class="fa fa-arrow-right"></i>
								</router-link>
								
								<a href="javascript:void(0)" v-on:click="removeClient(client.id)" class="ml-3">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    data() {
        return {
            clients: null,
			filters: {}
        }
    },
    mounted() {
        this.getClients()
    },
    methods: {
        getClients() {
            axios.get('/api/clients', { params: this.filters })
                .then(response => {
                    this.clients = response.data.data
                })
                .catch(error => {
					console.log(error)
				})
        },
		removeClient(id) {
            axios.delete(`/api/clients/${id}`)
                .then(response => {
					this.clients = this.clients.filter(_ => _.id !== id)
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
