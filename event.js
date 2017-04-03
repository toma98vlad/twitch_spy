var searchField = document.getElementById('searchField');

searchField.addEventListener('focus', textSelect);

function textSelect(){
	if(this.value.length > 0){
		this.value = '';
	}
}