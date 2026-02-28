INSERT INTO commande (date_commande, client, nombre_produits, total, status)
VALUES
('2026-03-01', 'Ali', 3, 250.00, 'Payer'),
('2026-03-02', 'Sara', 1, 120.00, 'Livrer'),
('2026-03-03', 'Omar', 2, 300.00, 'Expedier'),
('2026-03-04', 'Lina', 4, 180.00, 'En attente'),
('2026-03-05', 'Youssef', 1, 90.00, 'Annuler');


INSERT INTO ligne_commande (commande_id, produit_id, quantite, prix_unitaire)
VALUES
-- Commande 1 (Ali)
(1, 1, 2, 100.00),
(1, 3, 1, 50.00),

-- Commande 2 (Sara)
(2, 2, 1, 120.00),

-- Commande 3 (Omar)
(3, 4, 2, 150.00),

-- Commande 4 (Lina)
(4, 1, 2, 50.00),
(4, 2, 2, 40.00),

-- Commande 5 (Youssef)
(5, 3, 1, 90.00);