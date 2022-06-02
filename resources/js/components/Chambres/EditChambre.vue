<template lang="">

<form @submit.prevent="modifierChambre">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="Chambre.numchambre">
  <input type="text" class="form-control" placeholder="prix" v-model="Chambre.prix">
   <input type="text" class="form-control" placeholder="type" v-model="Chambre.type">
      <input type="text" class="form-control" placeholder="caracteristiques" v-model="Chambre.caracteristiques">

<div class="form-group">
 <input type="file" class="form-control"
placeholder="Image" @change="onFileChange">
</div>


 </div>


 <button type="submit" class="btn btn-block btn-primary">Modifier
Chambre</button>
</form>
</template>
<script>
export default {
 data() {
 return {
 Chambre:[]
 }
 },
 mounted (){
 this.getOneChambre() ;
 },
 methods: {

 modifierChambre(){
 const chamb = {
 numchambre:this.Chambre.numchambre,
 prix:this.Chambre.prix,
 type:this.Chambre.type,
 caracteristiques:this.Chambre.caracteristiques,
 imagechambre:this.Chambre.imagechambre
 }
 this.axios.put(`http://localhost:8000/api/chambres/${this.$route.params.id}`,chamb)
 .then(() => {
 this.$router.push('/chambres')})
 .catch(error => {
 this.errorMessage = error.message;
 console.error("There was an error!", error);})
 },
 onFileChange(e) {
 this.Chambre.imagechambre =
"images/chambres/"+e.target.files[0].name;
 },
 getOneChambre(){
 this.axios
 .get(`http://localhost:8000/api/chambres/${this.$route.params.id}`)
 .then((res) => {
 this.Chambre = res.data;
 });
 }
 }
}
</script>
<style lang="">

</style>
