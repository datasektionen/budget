<style>
.alert {
	height: 100px;
	position: fixed;
	right: 0;
	bottom: 0;
	left: 0;
	margin: 0;
	background: #fff;
	box-shadow: 0px -2px 20px rgba(0,0,0,0.1);
	overflow: hidden;
    z-index: 1;
}
.alert .content {
	max-width: 1200px;
	margin: 0 auto;
	padding: 10px 30px;
	position: relative;
}
.alert .content h2 {
	border: none !important;
	margin: 0 !important;
	padding: 0 !important;
	color: #e57373 !important;
	font-weight: normal !important;
}
.alert .content p {
	margin: 5px 0 0 0 !important;
}
.alert .content a.button {
	position: absolute;
	right: 30px;
	top: 15px;
	color: #fff !important;
}
</style>

<template>
<div v-if="suggestion">
    <div class="alert">
        <div class="content">
            <h2>Du ändrar nu budgetförslaget <i v-html="suggestion.name"></i></h2>
            <p>
                <span v-if="suggestion.authors && suggestion.authors.length === 1">Det kan bara visas av dig.</span>
                <span v-if="suggestion.authors && suggestion.authors.length === 2">
                    Det kan bara visas av dig och 
                    <span v-html="suggestion.authors.filter(x => user != null && x.id != user.id).map(x => x.first_name + ' ' + x.last_name).join(', ')"></span>.
                </span>
                <span v-if="suggestion.authors && suggestion.authors.length > 2 && suggestion.authors.length < 5">
                    Det kan bara visas av  
                    <span v-html="suggestion.authors.filter(x => user && x.id != user.id).map(x => x.first_name + ' ' + x.last_name).join(', ')"></span> och dig.
                </span>
                <span v-if="suggestion.authors && suggestion.authors.length >= 5">
                    Det kan bara visas av dig och <span v-html="suggestion.authors.length"></span> andra.
                </span>
                Ändrade budgetrader är markerade med <span class="suggestion">gråblå bakgrund</span>.
            </p>
            <a v-bind:href="'/suggestions/' + suggestion.id + '/done'" class="button theme-color">Lämna redigeringsläget</a>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['suggestion']
    }
</script>