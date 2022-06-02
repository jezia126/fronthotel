<template lang="">

<form @submit.prevent="ajouterChambre">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="numchambre">
  <input type="text" class="form-control" placeholder="prix" v-model="prix">
   <input type="text" class="form-control" placeholder="type" v-model="type">
    <input type="text" class="form-control" placeholder="caracteristiques" v-model="caracteristiques">



 </div>
  <div class="form-group">
     <FilePond max-files="1" @change="onFileChange"/>
 </div>

 

 <button type="submit" class="btn btn-block btn-primary">Ajouter
Chambre</button>
</form>
</template>
<script>

import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'; 
export default {
 components: {
 FilePond: vueFilePond(FilePondPluginImagePreview)
 }, 
 data() {
 return {
 numchambre: "",
 prix:"",
 type:"",
 caracteristiques:"",
 imagechambre: "",
 }
 },
 methods: {

 ajouterChambre(){
 const chamb = {
 numchambre:this.numchambre,
 prix:this.prix,
 type:this.type,
 caracteristiques:this.caracteristiques,
 imagechambre:this.imagechambre
 }
 this.axios.post("http://localhost:8000/api/chambres",chamb)
 .then(() => {this.$router.push('/chambres')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.imagechambre = "images/chambres/"+e.target.files[0].name;
 }
 }
}
</script>
<style lang="">

</style>
