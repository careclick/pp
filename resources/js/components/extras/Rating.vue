<template>
  <div>
    <form>
      <div class="rating">
        <input type="radio" v-model="rating" :value="5" /><label for="star5"></label>
        <input type="radio" v-model="rating" :value="4" /><label for="star4"></label>
        <input type="radio" v-model="rating" :value="3" /><label for="star3"></label>
        <input type="radio" v-model="rating" :value="2" /><label for="star2"></label>
        <input type="radio" v-model="rating" :value="1" /><label for="star1"></label>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    props:{
			avgrating:{
				type:[Number,String],
				default:0
			}
		},
    data(){
      return{
        rating:this.avgrating
      }
    },
  }
</script>

<style lang="scss" scoped>

$stars: 5;
$star-size: 20px;
$star-spacing: 2px;
$star-on-color: #F9DF4A;
$star-off-color: #CCCCCC;

.rating {
	width: ($star-size * $stars) + ($star-spacing * ($stars - 1));
	height: $star-size;

	label {
		float: right;
		position: relative;
		width: $star-size;
		height: $star-size;
		cursor: pointer;
		
		&:not(:first-of-type) {
			padding-right: $star-spacing;
		}
		
		&:before {
			content: "\2605";
			font-size: $star-size + 2px;
			color: $star-off-color;
			line-height: 1;
		}
	}
	
	input {
		display: none;
	}
	
	input:checked ~ label:before,
	&:not(:checked) > label:hover:before,
	&:not(:checked) > label:hover ~ label:before {
		color: $star-on-color;
	}
}

</style>