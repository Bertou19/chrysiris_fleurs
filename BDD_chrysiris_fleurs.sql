table magasin{
  id_magasin int AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR (100)
}

table produits{
  id_produits int AUTO INCREMENT PRIMARY KEY,
  nom VARCHAR (100),
  description VARCHAR (500),
  prix int (11),
  categorie VARCHAR (100)
}

table commande{
  id_commande int AUTOINCREMENT PRIMARY KEY,
  reference varchar(255) NOT NULL,
  id_users int NOT NULL,
  created_at datetime NOT NULL
}

table commande_details{
  id_commande int AUTOINCREMENT PRIMARY KEY,
  id_produits int NOT NULL,
  quantity int NOT NULL,
  prix int(11) NOT NULL
}

table images{
  id_images int AUTO INCREMENT PRIMARY KEY,
  nom VARCHAR (250)
}

table categories{
  id_categories int AUTO INCREMENT PRIMARY KEY,
  nom varchar (100),
  parent_id int (11)
}

table users{
  id_users INT AUTO INCREMENT PRIMARY KEY,
  nom VARCHAR(250),
  prenom VARCHAR (250),
  adresse VARCHAR(250),
  ville VARCHAR (250),
  zipcode VARCHAR (5),
  email VARCHAR(250),
telephone (250),
password VARCHAR (250),
role VARCHAR (100)
};

table galerie{
  id_galerie INT AUTO INCREMENT PRIMARY KEY,
  nom VARCHAR (250),
  titre VARCHAR (250)
};


table horaires{
  id_horaires INT AUTO INCREMENT PRIMARY KEY,
  horaires_debut_am VARCHAR (50),
  horaires_fin_am VARCHAR (50),
  horaires_debut_pm VARCHAR (50),
  horaires_fin_pm VARCHAR (50),
  jour VARCHAR (50),
};

