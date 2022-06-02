<template>
 <div>
 <h2 class="text-center">Liste des Reservations </h2>
<router-link class="nav-link pr-3" to="/AddReservation"> <img :src="'../storage/images/50.jpg'"  width="70">
 </router-link>
 <table class="table" id="example">
 <thead>
 <tr>
 <th>numero de reservation</th>
 <th>datearrivée</th>
 <th>datedepart</th>
 <th>client</th>
 <th>chambre </th>
 
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="p in Reservations" :key="p.id">
 <td>{{p.numreservation}}</td>
 <td>{{p.datearr}}</td>
 <td>{{p.datedep}}</td>
 <td>{{p.chambres.numchambre}}</td>
 <td>{{p.clients.npr}}</td>
 
 <td>
 <button @click.prevent="deleteReservation(p.id)" 
><img :src="'../storage/images/3.jpg'"  width="70"></button></td>
<td>
    <router-link :to="{name: 'editReservations', params: { id: p.id }}" 
><img :src="'../storage/images/6.jpg'"  width="70"> </router-link>
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
 Reservations: [] 
 }
 },
 mounted() {
 this.getReservations();
 },
 methods: {
 deleteReservation(id) {
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
 this.axios
 .delete(`http://localhost:8000/api/reservations/${id}`)
 .then(res => {
 console.log(res)
 this.getReservations();
 })
 .catch(error => {
 console.log(error)
 });
 }
 },
 getReservations(){
 this.axios
 .get('http://localhost:8000/api/reservations/')
 .then(response => {
 this.Reservations = response.data;
 $(function() {$('#example').DataTable();});
 });
 }
 }
 }
</script>