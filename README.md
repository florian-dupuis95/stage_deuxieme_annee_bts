durant ce stage 
j'ai dut créer un application web en php et sql

1. contexte

Actuellement, toutes les informations concernant les applications locales sont stockées dans des fichiers accessibles (excel, powerpoint, etc.) sur le répertoire partagé de la DSI1.

Ces informations sont difficiles à maintenir à jour car il ne faut oublier aucun fichier.

2. objectif

L’objectif est de créer une nouvelle application permettant de centraliser l’ensemble des informations concernant les applications locales.

Dans un premier temps, il s’agira de récupérer les données issues du fichier Excel applications_locales.xlsx et de proposer une interface web permettant la gestion de ses données.

le cahier des charge se situe dans avant projet,
le model de la base de donnée et les action possible au final dans analye et conception,
la base de donnée dans réalisation,
les test des fontcion dans qualification et recette,
et le code dans gestion application du siec

cas d'utilisation
```plantuml
@startuml
left to right direction
actor "utilisateur_anonyme" as anonyme
actor "utilisateur" as user
actor "administrateur" as admin
rectangle gestion_des_application_locale {
  usecase "authentification" as UC1
  usecase "ajout d'un colocataire" as UC2
  usecase "modification d'un colocataire" as UC3
  usecase "supression d'un colocataire" as UC4
  usecase "consultation fiche d'un utilisateur" as UC5
  usecase "ajout d'un role" as UC6
  usecase "modification d'un role" as UC7
  usecase "suppression d'un role" as UC8
  usecase "consultation fiche d'un role" as UC9
  usecase "ajout d'un réseau" as UC10
  usecase "modification d'un réseau" as UC11
  usecase "suppression d'un réseau" as UC12
  usecase "consultation fiche d'un réseau" as UC13
  usecase "ajout d'un type" as UC14
  usecase "modification d'un type" as UC15
  usecase "suppression d'un type" as UC16
  usecase "consultation fiche d'un type" as UC17
  usecase "ajout d'un serveur" as UC18
  usecase "modification d'un serveur" as UC19
  usecase "suppression d'un serveur" as UC20
  usecase "consultation fiche d'un serveur" as UC21
  usecase "ajout d'une application" as UC22
  usecase "modification d'une application" as UC23
  usecase "suppression d'une application" as UC24
  usecase "consultation fiche d'une application" as UC25
  usecase "déconnexion" as UC26
 
}
anonyme --> UC1
admin --> UC2
admin --> UC3
admin --> UC4
admin --> UC5
admin --> UC6
admin --> UC7
admin --> UC8
admin --> UC9
user --> UC10
user --> UC11
user --> UC12
user --> UC13
user --> UC14
user --> UC15
user --> UC16
user --> UC17
user --> UC18
user --> UC19
user --> UC20
user --> UC21
user --> UC22
user --> UC23
user --> UC24
user --> UC25
user --> UC26
user <|---admin
anonyme<|--user
@enduml
```