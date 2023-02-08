create database takalo;

-- use 4258210_alicetakalo;
use alicevaliha_base;

create table Utilisateur(
    id_utilisateur int primary key auto_increment,
    nom varchar(100),
    email varchar(100),
    mdp varchar(100)
);

create table Categorie(
    id_categorie int primary key auto_increment,
    nom_categorie varchar(100)
);

create table Objet(
    id_objet int primary key auto_increment,
    nom_objet varchar(100),
    prix double,
    id_proprietaire int,
    id_cat int,
    descri text,
    img varchar(40),
    stat int,
    foreign key(id_proprietaire) references Utilisateur(id_utilisateur),
    foreign key(id_cat) references Categorie(id_categorie)
);
--stat
--0 : a moi
--1 :échangé mais a moi
--2 : échangé plus a moi

create table Proposition(
    id_proposition int primary key auto_increment,
    id_demande int,
    id_proprio int,
    id_objetdemande int,
    id_objetoffert int,
    stat int,
    foreign key(id_demande) references Utilisateur(id_utilisateur),
    foreign key(id_proprio) references Utilisateur(id_utilisateur),
    foreign key(id_objetdemande) references Objet(id_objet),
    foreign key(id_objetoffert) references Objet(id_objet)
);

--stat 
--0 : envoyée
--1 : acceptée
--2 : refusée

create table exchanges(
    id_proposition int,
    moment datetime,
    foreign key(id_proposition) references Proposition(id_proposition)
);

insert into Utilisateur values(null,"Admin","admin@gmail.com","admin");
insert into Utilisateur values(null,"Julia","julia3@gmail.com","juju");
insert into Utilisateur values(null,"Bela","bela6@gmail.com","bebe");
insert into Utilisateur values(null,"Thora","thora4@gmail.com","thot");
insert into Utilisateur values(null,"Renee","renee8@gmail.com","rere");
insert into Utilisateur values(null,"Debbie","debbie7@gmail.com","dede");
insert into Utilisateur values(null,"Lisa","lisa3@gmail.com","lili");

insert into Categorie values(null,"accessoires");
insert into Categorie values(null,"cosmetique");
insert into Categorie values(null,"deco");
insert into Categorie values(null,"mobilier");
insert into Categorie values(null,"vetement");

insert into Objet values(null,"Boucles d'oreilles or",30,2,1,"Belles boucles d'oreilles en or authentique","boucles.jpg",0);
insert into Objet values(null,"Bracelet or",26,3,1,"Bracelet fin en or authentique","bracelet.jpg",0);
insert into Objet values(null,"Collier double perle",10,2,1,"Collier en perles acier inoxydable","collier.jpg",0);
insert into Objet values(null,"Bagues paire",12,6,1,"Jolie paire de bagues neuves non portées","petites bagues.jpg",0);
insert into Objet values(null,"Pochette de ville",40,7,1,"Pochette en cuir authentique","pochette.jpg",0);
insert into Objet values(null,"sac patchwork",25,2,1,"Belles pochette moderne en faux cuir","sac patchwork.jpg",0);

insert into Objet values(null,"Rouge a lèvre Dior",20,5,2,"Rouge a lèvres Dior rouge puissant neuf","dior rouge.jpg",0);
insert into Objet values(null,"Parfums Dolce and Gabana",46,4,2,"Paire de parfums Dolce and Gabana authentique","dolce gabana.jpg",0);
insert into Objet values(null,"Fond de teint YSL",30,2,2,"Fond de teint Yves Saint Laurent","fdt.jpg",0);
insert into Objet values(null,"Sun di Goia Armani",50,4,2,"Parfum Giogio Armani a peine entamé Sun di Goia","parfum.jpg",0);
insert into Objet values(null,"Rouge à lèvres rose poudré",15,7,2,"Rose a levre becca","roselevre.jpg",0);


create or replace view v_allobjects as 
select o.id_objet,o.nom_objet,o.prix,u.nom,u.id_utilisateur,o.id_cat,o.img,o.descri
from Objet as o join Utilisateur as u on o.id_proprietaire=u.id_utilisateur;

create or replace view v_allobjects2 as 
select c.nom_categorie,p.id_objet,p.nom_objet,p.prix,p.nom,p.id_utilisateur,p.id_cat,p.img,p.descri
from v_allobjects as p
join Categorie as c on p.id_cat=c.id_categorie;

create or replace view subquery1 as
select v.nom_objet,v.prix,v.img,p.id_proprio,p.stat,p.id_proposition,v.nom_categorie,v.nom,v.id_objet
from v_allobjects2 as v
join Proposition  as p on v.id_objet=p.id_objetdemande;

create or replace view subquery2 as
select v.nom_objet,v.prix,v.img,p.id_proprio,v.nom_categorie,v.nom,v.id_objet
from v_allobjects2 as v
join Proposition  as p on v.id_objet=p.id_objetoffert;

create or replace view v_propositions as 
select demande.stat,demande.id_proposition,demande.id_proprio,demande.nom_objet as demande,demande.prix as prixdemande,demande.img as imgd,offert.nom as demandeur,demande.nom_categorie as categoried
,demande.id_objet as idd,demande.nom as offreur,offert.nom_objet as offert,offert.prix as prixoffert,offert.img as imgo,offert.nom_categorie as categorieo,offert.id_objet as ido
from subquery1
as demande
join subquery2
as offert 
on demande.id_proprio=offert.id_proprio;

create or replace view historique as
select p.idd as id_objet,HOUR(e.moment) as heure,DATE(e.moment) as madate,p.demandeur,p.offreur
from exchanges as e
join v_propositions as p on e.id_proposition=p.id_proposition;