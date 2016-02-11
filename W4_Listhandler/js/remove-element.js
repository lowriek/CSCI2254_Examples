document.getElementById("moveright").addEventListener("click", leftListHandler);
document.getElementById("moveleft").addEventListener("click", rightListHandler);

/*** Take an item off the left list and put it on the right list ***/
function leftListHandler(){
	addToRight(deleteFromLeft());
}
function rightListHandler(){

}
function deleteFromLeft(){
	var list = document.querySelector('ul#leftlist');
	var lastitem = list.lastElementChild;
	var savetext=lastitem.innerHTML

	// Remove the element.
	list.removeChild(lastitem);
	return savetext;
}
function addToRight(newtext){
	// Create a new element and store it in a variable.
	var newEl = document.createElement('li');

	// Create a text node and store it in a variable.
	var newText = document.createTextNode(newtext);

	// Attach the new text node to the new element.
	newEl.appendChild(newText);

	// Find the position where the new element should be added.
	var rightList = document.querySelector('ul#rightlist');

	// Insert the new element into its position.
	rightList.appendChild(newEl);
}