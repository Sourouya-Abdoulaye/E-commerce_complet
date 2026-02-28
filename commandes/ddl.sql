DROP TABLE IF EXISTS ligne_commande;
DROP TABLE IF EXISTS commande;

CREATE TABLE commande (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    -- num_commande TEXT NOT NULL UNIQUE,
    date_commande DATE NOT NULL,
    client TEXT NOT NULL,
    nombre_produits INTEGER NOT NULL CHECK (nombre_produits >= 0),
    total NUMERIC NOT NULL CHECK (total >= 0),
    status TEXT NOT NULL CHECK (
        status IN ('En attente', 'Payer', 'Expedier', 'Livrer', 'Annuler')
    )
);


CREATE TABLE ligne_commande (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    commande_id INTEGER NOT NULL,
    produit_id INTEGER NOT NULL,
    quantite INTEGER NOT NULL CHECK (quantite > 0),
    prix_unitaire NUMERIC NOT NULL CHECK (prix_unitaire > 0),

    FOREIGN KEY (commande_id) REFERENCES commande(id),
    FOREIGN KEY (produit_id) REFERENCES products(id)
);