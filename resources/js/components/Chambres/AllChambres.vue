<template>
 <div>

 <h2 class="text-center " >Liste des chambres</h2>
  <button type="submit" class="btn btn-outline-primary" >

 <router-link class="nav-link pr-3" to="/AddChambre"> <img :src="'../storage/images/addSC.png'"  width="70">
 </router-link></button>
 <table class="table" id="example">

 <thead>
 <tr>
 <th>Num Chambres</th>
  <th>type</th>
   <th>prix</th>
    <th>caracteristique</th>
 <th>Image</th>
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="cat in Chambres" :key="cat.id">
 <td>{{cat.numchambre}}</td>
 <td>{{cat.type}}</td>
 <td>{{cat.prix}}</td>
  <td>{{cat. caracteristiques}}</td>


 <td><img :src="'../storage/'+cat.imagechambre" :alt=cat.numchambre
width="300"></td>
 <td>
 <a @click.prevent="deleteChambre(cat.id)"
><img :src="'../storage/images/deleteSc.png'"  width="70"></a></td>
<td>
<router-link :to="{name: 'editChambre', params: { id: cat.id }}" ><img :src="'../storage/images/editSc.png'"  width="70"> </router-link></td>
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
 Chambres: []
 }
 },
 mounted() {
 this.getChambres();
 },
 methods: {
 deleteChambre(id) {

 this.axios
 .delete(`http://localhost:8000/api/chambres/${id}`)
 .then(res => {
 console.log(res)
 this.getChambres();
 })
 .catch(error => {
 console.log(error)
 });
 },
 getChambres(){
 this.axios
 .get('http://localhost:8000/api/chambres/')
 .then(response => {
 this.Chambres = response.data;
 $(function() {$('#example').DataTable();}); 
 });
 }
 }
 }
</script>
