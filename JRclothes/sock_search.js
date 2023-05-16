let foundItem = -1;

sockName = ["Blue Socks in size 3","Red Socks in size 3","White Socks in size 3","Yellow Socks in size 3","Pink Socks in size 3","Black Socks in size 3","Red Sock2","Sock3","Sock4","Sock5","Sock6" ]

sockColour = ["Blue", "Red", "White", "Yellow", "Pink", "Black", "Blue", "Red", "White", "Yellow", "Pink", "Black" ];

sockSize = [3, 3,3,3,3,3,4, 5, 6, 7, 8, ]; 

sockGender = ["Female", "Female","Female","Female","Female","Female", "Male", "Unisex", "Female", "Male", "Unisex" ];



function SearchSocks(){
	searchForm = document.getElementById("SearchSocks");
	let gender = searchForm.gender.value;
	let colourIndex = searchForm.colours.selectedIndex;
	let colour = searchForm.colours[colourIndex].value;
	let sizeIndex = searchForm.size.selectedIndex;
	size =  searchForm.size[sizeIndex].value;

	

	for(i = 0 ; i < sockName.length; i++){
		if(sockColour[i] == colour){
			if (sockSize[i] == size) {
				if (sockGender[i] == gender) {
					foundItem = i;
				}
			}
		}
	}


	if(foundItem >= 0){
		alert("You need: " + sockName[foundItem]);
	}
	else{
		alert("Sorry no matching socks available" );
	}

}


let Submitbtn = document.getElementById("Submitbtn");
Submitbtn.addEventListener("click", SearchSocks);
