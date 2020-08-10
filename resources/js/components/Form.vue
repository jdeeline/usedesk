<template>
	<div class="card">
		<div class="card-header">{{ title }}</div>
		<form class="card-body" @submit.prevent="onSave">
			<div v-if="editing" class="row my-2">
				<label class="col-md-3 form-col-label">ID</label>
				<div class="col-md-9">
					<input type="text" class="form-control form-control-plaintext" v-model="client.id" required>
				</div>
			</div>
			<div class="row my-2">
				<label class="col-md-3 form-col-label">Имя</label>
				<div class="col-md-9">
					<input type="text" class="form-control" v-model.trim="client.name" required>
				</div>
			</div>
			<div class="row my-2">
				<label class="col-md-3 form-col-label">Фамилия</label>
				<div class="col-md-9">
					<input type="text" class="form-control" v-model.trim="client.surname" required>
				</div>
			</div>
			<div class="row my-2">
				<label class="col-md-3 form-col-label">Почтовые ящики</label>
				<div class="col-md-9">
					<div class="row my-2" v-for="(email, index) in client.emails">
						<div class="col-md-9">
							<input type="text" class="form-control" v-model.trim="client.emails[index]" required>
						</div>
						<div class="col-md-3">
							<button v-if="client.emails.length > 1" type="button" class="btn btn-danger" v-on:click="client.emails.splice(index, 1)">
								<i class="fa fa-trash"></i>
							</button>
						</div>
					</div>
					<button type="button" v-on:click="client.emails.push('')" class="btn btn-sm btn-success">Добавить E-mail</button>
				</div>
			</div>
			<div class="row my-2">
				<label class="col-md-3 form-col-label">Телефоны</label>
				<div class="col-md-9">
					<div class="row my-2" v-for="(phone, index) in client.phones">
						<div class="col-md-9">
							<input type="text" class="form-control" v-model.trim="client.phones[index]" required>
						</div>
						<div class="col-md-3">
							<button v-if="client.phones.length > 1" type="button" class="btn btn-danger" v-on:click="client.phones.splice(index, 1)">
								<i class="fa fa-trash"></i>
							</button>
						</div>
					</div>
					<button type="button" v-on:click="client.phones.push('')" class="btn btn-sm btn-success">Добавить номер</button>
				</div>
			</div>
			<div class="row my-4">
				<div class="col-md-9 offset-md-3">
					<button type="submit" class="btn btn-success">Сохранить</button>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            editing: false,
            client: {
				emails: [],
				phones: []
			}
        }
    },
    methods: {
        onSave() {
            if (!this.editing) {
                axios.post('/api/clients', this.client)
                    .then(response => {
                        this.$router.push({ name: 'clients' })
                    })
					.catch(error => {
						console.log(error)
					})
            } else {
                axios.patch(`/api/clients/${this.client.id}`, this.client)
                    .then(response => {
                        this.$router.push({ name: 'clients' })
                    })
					.catch(error => {
						console.log(error)
					})
            }
        }
    },
    created() {
        if ('id' in this.$route.params) {
            axios.get(`/api/clients/${this.$route.params.id}`)
                .then(response => {
                    this.client = response.data.data
                    this.editing = true
                })
                .catch(error => {
					console.log(error)
				})
        }
    }
}
</script>
