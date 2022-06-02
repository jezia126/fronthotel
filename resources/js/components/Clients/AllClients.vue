<template>
 <div>

 <h2 class="text-center">Liste des clients</h2><button>
<router-link class="nav-link pr-3" to="/AddClient"> <img :src="'../storage/images/user_add.png'"  width="70">
 </router-link></button>
 <table class="table" id="example">

 <thead>
 <tr>
 <th>Nom </th>
 <th>adresse</th>
  <th>email</th>
  

 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="cat in Clients" :key="cat.id">
 <td>{{cat.npr}}</td>
 <td>{{cat.adresse}}</td>
  <td>{{cat.email}}</td>

 <td>
 <button @click.prevent="deleteClient(cat.id)" ><img :src="'../storage/images/user_delete.png'"  width="70"></button></td>
 <td>
    <router-link :to="{name: 'editClients', params: { id: cat.id }}" class="btn
btn-success"><img :src="'../storage/images/user_edit.png'"  width="70"> </router-link>
</td>
 </tr>
 </tbody>
 </table>
 </div>
</template>

<script>
//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery'; 
 export default {
 data() {
 return {
 Clients: []
 }
 },
 mounted() {
 this.getClients();
 },
 methods: {
 deleteClient(id) {
      if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
 this.axios
 .delete(`http://localhost:8000/api/clients/${id}`)
 .then(res => {
 console.log(res)
 this.getClients();
 })
 .catch(error => {
 console.log(error) 
 });
      }
 },
 getClients(){
 this.axios
 .get('http://localhost:8000/api/clients/')
 .then(response => {
 this.Clients = response.data;
 $(function() {$('#example').DataTable();}); 
 });
 }
 }
 }
</script>