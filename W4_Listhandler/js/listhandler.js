document.getElementById("moveright").addEventListener("click", leftListHandler);
document.getElementById("moveleft").addEventListener("click", rightListHandler);

/*** Take an item off the left list and put it on the right list ***/
function leftListHandler(){
	addToList('ul#rightlist', deleteFromList('ul#leftlist'));
}
function rightListHandler(){
	addToList('ul#leftlist', deleteFromList('ul#rightlist'));
}
function deleteFromList(listid){
	var list = document.querySelector(listid);
	if (!list) return -1 ;
	
	var lastitem = list.lastElementChild;
	if (!lastitem) return -1;
	
	var savehtml=lastitem.innerHTML

	list.removeChild(lastitem);
	return savehtml;
}

function addToList(listid, htmlToAdd){
	if (htmlToAdd === -1) return;
	
	// Create a new element and store it in a variable.
	var newEl = document.createElement('li');

	newEl.innerHTML=htmlToAdd;

	// Find the position where the new element should be added.
	var list = document.querySelector(listid);

	// Insert the new element into its position.
	list.appendChild(newEl);
}
