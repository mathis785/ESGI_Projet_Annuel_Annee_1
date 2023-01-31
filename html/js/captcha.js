var puzzle = document.getElementById('puzzle');
var win = document.getElementById('win'); 
 
var a = [ "pics/puzzleA1.png", "pics/puzzleA2.png", "pics/puzzleA3.png",
		  "pics/puzzleB1.png", "pics/puzzleB2.png", "pics/puzzleB3.png",
		  "pics/puzzleC1.png", "pics/puzzleC2.png", "pics/puzzleC3.png"] 
		  
.map( (x,i) => [x,i, Math.random()]) 
.sort( (a,b) => a[2]-b[2]) 
let place;

for(let i=0; i<a.length; i++) { 
	let pic = document.createElement('img'); 
	pic.src = a[i][0]; 
	pic.place = a[i][1]; 
	pic.clicked = false;
	puzzle.appendChild(pic); 
	} 

var step = 1; 
var p1, p2;

document.addEventListener('click', function(e){
	switch(step){
		case 1: // premiere image
      if(e.target.tagName == 'IMG'){
			e.target.className = 'select';
			e.target.clicked = true;
			p1 = e.target;
			step=2;
			break;
      }
		case 2: // deuxieme image 
      if(e.target.tagName == 'IMG'){
			e.target.className = 'select';
			e.target.clicked = true;
			p2 = e.target;
			step=3;
      }
      
			// changement
			let place = p2.place;
			let src = p2.src;
			p2.place = p1.place;
			p2.src = p1.src;
			p1.place = place;
			p1.src = src;
			p1.className = p2.className = "";
			step = 1;
			if(isWin()) {
				win.textContent="Captcha validé";
				step = 4;
			};
			break; 
	}
})

function isWin(){ 
	let pics = document.getElementsByTagName('img');
	for (let i=0 ; i<pics.length ; i++) if (pics[i].place != i) console.log('no');
	console.log('yes');
}