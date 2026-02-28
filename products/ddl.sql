DROP TABLE IF EXISTS products;

CREATE TABLE products(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    libelle TEXT NOT NULL,
    prix NUMERIC NOT NULL CHECK (prix > 0),
    quantite INTEGER NOT NULL CHECK (quantite >= 0),
    categorie TEXT NOT NULL CHECK (
        categorie IN ('Habit','Pantalon','Chaussure','Casquette')
    ),
    date DATE NOT NULL,
    image TEXT NOT NULL
);
