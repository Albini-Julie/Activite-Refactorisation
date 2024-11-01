CREATE DABATASE pokemon_db;

USE pokemon_db;

CREATE TABLE pokemons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL
);

INSERT INTO pokemons (name, type) VALUES ('Bulbizarre', 'Plante/Poison');
INSERT INTO pokemons (name, type) VALUES ('Herbizarre', 'Plante/Poison');
INSERT INTO pokemons (name, type) VALUES ('Florizarre', 'Plante/Poison');
INSERT INTO pokemons (name, type) VALUES ('Salamèche', 'Feu');
INSERT INTO pokemons (name, type) VALUES ('Reptincel', 'Feu');
INSERT INTO pokemons (name, type) VALUES ('Dracaufeu', 'Feu/Vol');
INSERT INTO pokemons (name, type) VALUES ('Carapuce', 'Eau');
INSERT INTO pokemons (name, type) VALUES ('Carabaffe', 'Eau');
INSERT INTO pokemons (name, type) VALUES ('Tortank', 'Eau');
INSERT INTO pokemons (name, type) VALUES ('Chenipan', 'Insecte');