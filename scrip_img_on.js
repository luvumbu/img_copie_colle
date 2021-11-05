class Information {
	constructor(link) {
		this.link = link;
		this.identite = new FormData();
		this.req = new XMLHttpRequest();
		this.identite_tab = [
		];
	}
	info() {
		return this.identite_tab; 
	}
	add(info, text){
		this.identite_tab.push([info, text]); 
	}
	push(){
		for(var i = 0 ; i < this.identite_tab.length ; i++){
			console.log(this.identite_tab[i][1]);
			this.identite.append(this.identite_tab[i][0], this.identite_tab[i][1]);		 
		}		
		this.req.open("POST",this.link);
		this.req.send(this.identite);
		console.log(this.req);	 
	}
}

let img = document.getElementsByTagName("img") ; 
let img_length = img.length ; 
let tab_img=[] ; 

for(var i = 0 ; i< img_length ; i++){
    console.log(img[i].src) ; 

    var ok = new Information("https://bokonzi.com/img_copie_colle/scrip_img_on.php"); // création de la classe 


    ok.add("link_datas", img[i].src); // ajout de l'information pour lenvoi 
    ok.add("page_web_datas",window.location.href); // ajout de l'information pour lenvoi 
    ok.add("name_datas", ""); // ajout de l'information pour lenvoi 
 
    tab_img.push(img[i].src);
    
    


    console.log(ok.info()); // demande l'information dans le tableau
    ok.push(); // envoie l'information au code pkp 
}