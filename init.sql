select utilisateurs.id , utilisateurs.nom , langues.nom  
from utilisateurs INNER join profils on utilisateurs.id = profils.utilisateur_id 
inner join profil_langue on profil_langue.profil_id = profils.id 
inner join langues on langues.id = profil_langue.langue_id 
where utilisateurs.role='freelance'and langues.nom = 'Anglais';

select  utilisateurs.id , utilisateurs.nom , COUNT(profil_competence.competence_id) AS Nbr 
from utilisateurs INNER join profils on utilisateurs.id = profils.utilisateur_id 
inner join profil_competence on profil_competence.profil_id = profils.id 
where utilisateurs.role='freelance'
GROUP BY  utilisateurs.nom , profil_competence.competence_id 
HAVING Nbr > 3 ;


select utilisateurs.id , utilisateurs.nom , profils.disponible , profils.tarif_horaire , adresses.ville
from  utilisateurs INNER join profils on utilisateurs.id = profils.utilisateur_id 
inner join adresses on adresses.utilisateur_id = utilisateurs.id 
where profils.disponible = 1 and utilisateurs.role ='freelance' ; 

select utilisateurs.id , utilisateurs.nom 
from utilisateurs where utilisateurs.id not in (select profils.id from profils ) ;


select utilisateurs.id , utilisateurs.nom 
from utilisateurs where utilisateurs.role ='client' and utilisateurs.id not in ( select projets.client_id from projets) ;
//============================================================================

select projets.titre , projets.budget , COUNT(offres.id) as offres_reçues from project 
inner join offres on offres.projet_id = projets.id 
inner join missions on missions.offre_id = offres.id
where projets.statut = 'ouvert' and missions.statut ='validé' 
GROUP by offres_reçue ;

//============================================================================

select utilisateurs.nom , COUNT(offres.id) as nbr from utilisateurs 
inner join offres on  offres.freelance_id = utilisateurs.id
inner join projets on projets.id = offres.projet_id
WHERE utilisateurs.role = 'freelance'
GROUP by utilisateurs.nom
having  nbr > 5

select *
FROM offres
LEFT join utilisateurs on offres.freelance_id = utilisateurs.id
inner JOIN profils on profils.utilisateur_id = utilisateurs.id 
where utilisateurs.role = 'freelance' and profils.tarif_horaire < 100 ; 


select projets.titre 
from projets
inner join offres on offres.projet_id = projets.id 
inner join missions on missions.offre_id = offres.id
where missions.statut = 'validé';


select projets.titre , missions.date_debut , missions.date_fin 
from projets 
INNER join offres on offres.projet_id = projets.id
inner join missions on missions.offre_id = offres.id
where projets.statut = 'terminé'