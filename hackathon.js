const candidatures = [];

//ajouterCandidature(nom, age, projet)
let  id = 1 ;
function ajouterCandidature(nom, age, projet){
   id++;
   let  statut = 'en attente';
  let obj = {
    'id' : id,
    'nom' : nom ,
    'age' : age ,
    'projet' : projet,
    'statut' : statut
  }
   
  candidatures.push(obj);
  
}

ajouterCandidature('ismail',24,'Projet1');
ajouterCandidature('princess',20,'Projet2');
ajouterCandidature('sweethome',22,'Projet3');
ajouterCandidature('ali',19,'Projet3');


function afficherToutesLesCandidatures(){
   candidatures.map((candidacature) =>{
              return console.log(candidacature);
   })
}



function validerCandidature(id){

  candidatures.forEach(candidacature => {
        if(candidacature.id == id){
            candidacature.statut = 'valide';
        }
  });

}


function rejeterCandidature(id){

    candidatures.forEach(candidacature => {
          if(candidacature.id == id){
              candidacature.statut = 'rejetée';
          }
    });
  }

function rechercherCandidat(nom){
    candidatures.forEach(candidacature => {
        if(candidacature.nom == ''){
            console.log('veuillez remplir la case')
        }else if(candidacature.nom == nom){
            console.log(candidacature);
        }else{
            console.log('Nom non trouver !');
        }
  });
}


function filtrerParStatut(statut){
   let result = candidatures.filter((candidature) =>{return candidature.statut = statut} );
   console.log(result);
}

function statistiques(){

     let Total_des_candidatures = candidatures.length ;
     let Validees = 0 ;
     let Rejetees = 0 ;
     let En_attente = 0 ;

   candidatures.map(candidature =>{
        if(candidature.statut == 'en attente'){
            En_attente++
        }
        if(candidature.statut == 'rejetée'){
            Rejetees++
        }
        if(candidature.statut == 'valide'){
            Validees++
        }
   })


   let statistique = {
    'total' : Total_des_candidatures ,
     'Validees' : Validees,
     'Rejetees' : Rejetees ,
     'En_attente' : En_attente 
   }

   console.log(statistique);
 

}

function trierParAge(desc){

    if(desc == true){
        for(let i = 0 ; i<candidatures.length -1 ; i++){
     if(candidatures[i+1].age > candidatures[i].age ){
       let temp = candidatures[i]
       candidatures[i] = candidatures[i + 1] ;
       candidatures[i + 1] = temp ;
     }
}

for(let i = 0 ; i<candidatures.length ; i++){
    console.log(candidatures[i]);
}

  desc = false ;
 
    }

if(desc == false ){
    for(let i = 0 ; i<candidatures.length -1 ; i++){
        if(candidatures[i+1].age < candidatures[i].age ){
          let temp = candidatures[i]
          candidatures[i] = candidatures[i + 1] ;
          candidatures[i + 1] = temp ;
        }
   }
   
   for(let i = 0 ; i<candidatures.length ; i++){
       console.log(candidatures[i]);
   }
}



}


function trierParNom(){
   
    for(let i = 0 ; i<candidatures.length -1 ; i++){
         if(candidatures[i+1].nom > candidatures[i].nom ){
           let temp = candidatures[i]
           candidatures[i] = candidatures[i + 1] ;
           candidatures[i + 1] = temp ;
         }
    }
    
    for(let i = 0 ; i<candidatures.length ; i++){
        console.log(candidatures[i]);
    }

    }

trierParAge();

