-- articles_les_plus_lus()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_les_plus_lus`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', articles.title AS titre
FROM TMP_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article
INNER JOIN articles ON profile_article_read.id_article = articles.id
WHERE TMP_article.year_article = pYear
AND profile_article_read.duration >= 30
GROUP BY profile_article_read.id_article
ORDER BY COUNT(*) DESC
LIMIT 4


-- articles_les_plus_lus_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_les_plus_lus_stats`(IN `pYear` INT)

SELECT MIN(readings.sumArticles) AS 'min', MAX(readings.sumArticles) AS 'max', ROUND(AVG(readings.sumArticles)) AS moy, SUM(readings.sumArticles) AS 'sum'
FROM (SELECT articles.title AS 'titre', COUNT(*) AS 'sumArticles' FROM TMP_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article
INNER JOIN articles ON profile_article_read.id_article = articles.id
WHERE TMP_article.year_article = pYear AND profile_article_read.duration >= 30
GROUP BY profile_article_read.id_article
ORDER BY COUNT(*) DESC) AS readings


-- articles_lus_client()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_client`(IN `pYear` INT)

SELECT COUNT(*) AS nb, customers.company_name AS nom_client FROM customers
INNER JOIN article_customer ON customers.id = article_customer.id_customer
INNER JOIN articles ON article_customer.id_article = articles.id
INNER JOIN profile_article_read ON articles.id = profile_article_read.id_article
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear AND profile_article_read.duration >= 30
AND articles.id NOT IN (
SELECT articles.id FROM customers
INNER JOIN article_tag ON customers.id_tag = article_tag.id_tag
INNER JOIN articles ON article_tag.id_article = articles.id
INNER JOIN profile_article_read ON articles.id = profile_article_read.id_article
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear AND profile_article_read.duration >= 30
)
GROUP BY customers.id
ORDER BY count(*) DESC


-- articles_lus_client_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_client_stats`(IN `pYear` INT)

SELECT MIN(customers.sumCustomers) AS 'min', MAX(customers.sumCustomers) AS 'max', ROUND(AVG(customers.sumCustomers)) AS moy, SUM(customers.sumCustomers) AS 'sum'
FROM (SELECT customers.company_name AS nom_client, COUNT(*) AS 'sumCustomers' FROM customers
INNER JOIN article_customer ON customers.id = article_customer.id_customer
INNER JOIN articles ON article_customer.id_article = articles.id
INNER JOIN profile_article_read ON articles.id = profile_article_read.id_article AND profile_article_read.duration >= 30
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND articles.id NOT IN (
SELECT articles.id FROM customers
INNER JOIN article_tag ON customers.id_tag = article_tag.id_tag
INNER JOIN articles ON article_tag.id_article = articles.id
INNER JOIN profile_article_read ON articles.id = profile_article_read.id_article
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear AND profile_article_read.duration >= 30) GROUP BY customers.id) AS customers


-- articles_lus_mois()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_mois`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', TMP_article.year_article AS 'year', TMP_article.month AS 'month'
FROM TMP_article INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article
WHERE TMP_article.year_article = pYear
AND profile_article_read.duration >= 30
GROUP BY TMP_article.month
ORDER BY TMP_article.month


-- articles_lus_mois_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_mois_stats`(IN `pYear` INT)

SELECT MIN(months.sumArticles) AS 'min', max(months.sumArticles) AS 'max', ROUND(AVG(months.sumArticles)) AS moy, SUM(months.sumArticles) AS 'sum'
FROM (SELECT TMP_article.year_article AS 'year', TMP_article.month AS 'month', COUNT(*) AS 'sumArticles' FROM TMP_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article
WHERE TMP_article.year_article = pYear
AND profile_article_read.duration >= 30
GROUP BY TMP_article.month) AS months


-- articles_lus_pigiste()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_pigiste`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', user.first_name AS prenom, user.last_name AS nom FROM user
INNER JOIN articles ON user.id = articles.id_user
INNER JOIN TMP_article ON articles.id = TMP_article.id_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article
WHERE TMP_article.year_article = pYear
AND user.rank > 0
AND profile_article_read.duration >= 30
GROUP BY prenom
ORDER BY count(*) DESC


-- articles_lus_pigiste_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_pigiste_stats`(IN `pYear` INT)

SELECT MIN(freelances.sumFreelances) AS 'min', max(freelances.sumFreelances) AS 'max', ROUND(AVG(freelances.sumFreelances)) AS moy, SUM(freelances.sumFreelances) AS 'sum'
FROM (SELECT user.first_name AS prenom, user.last_name AS nom, COUNT(*) AS 'sumFreelances' FROM user
INNER JOIN articles ON user.id = articles.id_user
INNER JOIN TMP_article ON articles.id = TMP_article.id_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article
WHERE TMP_article.year_article = pYear
AND user.rank > 0
AND profile_article_read.duration >= 30
GROUP BY user.id) AS freelances


-- articles_lus_tag()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_tag`(IN `pYear` INT)

SELECT COUNT(*) AS nb, tags.label AS nom_tag
FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article
WHERE TMP_article.year_article = pYear
AND profile_article_read.duration >= 30
GROUP BY article_tag.id_tag
ORDER BY count(*) DESC


-- articles_lus_tag_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_lus_tag_stats`(IN `pYear` INT)

SELECT MIN(tags.sumTags) AS 'min', MAX(tags.sumTags) AS 'max', ROUND(AVG(tags.sumTags)) AS 'moy', SUM(tags.sumTags) AS 'sum'
FROM (SELECT tags.label AS nom_tag, COUNT(*) AS 'sumTags' FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article
WHERE TMP_article.year_article = pYear
AND profile_article_read.duration >= 30
GROUP BY article_tag.id_tag) AS tags


-- articles_publies_client()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_client`(IN `pYear` INT)

SELECT COUNT(*) AS nb, customers.company_name AS nom_client FROM articles
INNER JOIN article_customer ON articles.id = article_customer.id_article
INNER JOIN customers ON article_customer.id_customer = customers.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND articles.id NOT IN (
SELECT articles.id FROM customers
INNER JOIN article_tag ON customers.id_tag = article_tag.id_tag
INNER JOIN articles ON article_tag.id_article = articles.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
)
GROUP BY customers.id
ORDER BY count(*) DESC
LIMIT 4


-- articles_publies_client_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_client_stats`(IN `pYear` INT)

SELECT MIN(customers.sumCustomers) AS 'min', MAX(customers.sumCustomers) AS 'max', ROUND(AVG(customers.sumCustomers)) AS 'moy', SUM(customers.sumCustomers) AS 'sum'
FROM (SELECT customers.company_name AS nom_client, COUNT(*) AS 'sumCustomers' FROM articles
INNER JOIN article_customer ON articles.id = article_customer.id_article
INNER JOIN customers ON article_customer.id_customer = customers.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND articles.id NOT IN (
SELECT articles.id FROM customers
INNER JOIN article_tag ON customers.id_tag = article_tag.id_tag
INNER JOIN articles ON article_tag.id_article = articles.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
) GROUP BY customers.id) AS customers


-- articles_publies_mois()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_mois`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', YEAR(FROM_UNIXTIME(publication_date)) AS 'year', MONTH(FROM_UNIXTIME(publication_date)) AS 'month'
FROM articles
WHERE YEAR(FROM_UNIXTIME(publication_date)) = pYear
GROUP BY MONTH(FROM_UNIXTIME(publication_date))
ORDER BY MONTH(FROM_UNIXTIME(publication_date))


-- articles_publies_mois_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_mois_stats`(IN `pYear` INT)

SELECT MIN(months.sumArticles) AS 'min', MAX(months.sumArticles) AS 'max', ROUND(AVG(months.sumArticles)) AS moy, SUM(months.sumArticles) AS 'sum'
FROM (SELECT MONTH(FROM_UNIXTIME(publication_date)) AS month, COUNT(*) AS 'sumArticles'
FROM articles WHERE YEAR(FROM_UNIXTIME(publication_date)) = pYear
GROUP BY MONTH(FROM_UNIXTIME(publication_date))) AS months


-- articles_publies_pigiste()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_pigiste`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', user.first_name AS prenom, user.last_name AS nom
FROM articles
INNER JOIN user ON articles.id_user = user.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND user.rank > 0
GROUP BY user.id
ORDER BY count(*) DESC


-- articles_publies_pigiste_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_pigiste_stats`(IN `pYear` INT)

SELECT MIN(freelances.sumFreelances) AS 'min', MAX(freelances.sumFreelances) AS 'max', ROUND(AVG(freelances.sumFreelances)) AS moy, SUM(freelances.sumFreelances) AS 'sum'
FROM (SELECT user.first_name AS prenom, user.last_name AS nom, COUNT(*) AS 'sumFreelances'
FROM articles
INNER JOIN user ON articles.id_user = user.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND user.rank > 0
GROUP BY user.id) AS freelances


-- articles_publies_tag()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_tag`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', tags.label AS nom_tag
FROM articles
INNER JOIN article_tag ON articles.id = article_tag.id_article
INNER JOIN tags ON article_tag.id_tag = tags.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY article_tag.id_tag
ORDER BY count(*) DESC
LIMIT 4


-- articles_publies_tag_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_tag_stats`(IN `pYear` INT)

SELECT MIN(tags.sumTags) AS 'min', MAX(tags.sumTags) AS 'max', ROUND(AVG(tags.sumTags)) AS 'moy', SUM(tags.sumTags) AS 'sum'
FROM (SELECT tags.label AS nom_tag, COUNT(*) AS 'sumTags'
FROM articles
INNER JOIN article_tag ON articles.id = article_tag.id_article
INNER JOIN tags ON article_tag.id_tag = tags.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY article_tag.id_tag) AS tags


-- create_tmp_article()

-- DROP INDEX TMP_article_index_year ON TMP_article;
-- DROP INDEX TMP_article_index_id ON TMP_article;
-- DROP TABLE IF EXISTS TMP_article;

CREATE TABLE TMP_article (id_article INT, year_article INT UNSIGNED, month INT UNSIGNED);
INSERT INTO TMP_article (SELECT id, YEAR(FROM_UNIXTIME(publication_date)), MONTH(FROM_UNIXTIME(publication_date)) FROM articles);

-- CREATE INDEX TMP_article_index_year ON TMP_article (year_article);
-- CREATE INDEX TMP_article_index_id ON TMP_article (id_article);


-- update_tmp_article

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_tmp_article`(IN `pYear` INT)


BEGIN
TRUNCATE TABLE TMP_article;
INSERT INTO TMP_article (SELECT id, YEAR(FROM_UNIXTIME(publication_date)), MONTH(FROM_UNIXTIME(publication_date)) FROM articles);
END



-- PROCEDURES pour Ecomnews Med


-- articles_publies_client()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_client`(IN `pYear` INT)

SELECT COUNT(*) AS nb, customers.company_name AS nom_client
FROM articles
INNER JOIN article_customer ON articles.id = article_customer.id_article
INNER JOIN customers ON article_customer.id_customer = customers.id
WHERE YEAR(FROM_UNIXTIME(articles.date)) = pYear
GROUP BY customers.company_name
ORDER BY COUNT(*) DESC

-- articles_publies_client_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_client_stats`(IN `pYear` INT)

SELECT MIN(customers.sumCustomers) AS 'min', MAX(customers.sumCustomers) AS 'max', ROUND(AVG(customers.sumCustomers)) AS moy, SUM(customers.sumCustomers) AS 'sum'
FROM (SELECT customers.company_name AS nom_client, COUNT(*) AS 'sumCustomers' FROM articles
INNER JOIN article_customer ON articles.id = article_customer.id_article
INNER JOIN customers ON article_customer.id_customer = customers.id
WHERE YEAR(FROM_UNIXTIME(articles.date)) = pYear
GROUP BY customers.id) AS customers

-- articles_publies_mois()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_mois`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', YEAR(FROM_UNIXTIME(date)) AS 'year', MONTH(FROM_UNIXTIME(date)) AS 'month'
FROM articles
WHERE YEAR(FROM_UNIXTIME(date)) = pYear
GROUP BY MONTH(FROM_UNIXTIME(date))
ORDER BY MONTH(FROM_UNIXTIME(date))

-- articles_publies_mois_stats()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_mois_stats`(IN `pYear` INT)

SELECT MIN(months.sumArticles) AS 'min', MAX(months.sumArticles) AS 'max', ROUND(AVG(months.sumArticles)) AS moy, SUM(months.sumArticles) AS 'sum'
FROM (SELECT MONTH(FROM_UNIXTIME(date)) AS month, COUNT(*) AS 'sumArticles' FROM articles WHERE YEAR(FROM_UNIXTIME(date)) = pYear
GROUP BY MONTH(FROM_UNIXTIME(date))) AS months

-- articles_publies_pigiste()

CREATE DEFINER=`root`@`localhost` PROCEDURE `articles_publies_pigiste`(IN `pYear` INT)

SELECT COUNT(*) AS 'nb', user.first_name AS prenom, user.last_name AS nom
FROM articles
INNER JOIN user ON articles.id_user = user.id
WHERE YEAR(FROM_UNIXTIME(articles.date)) = pYear
AND user.rank > 0
GROUP BY user.id
ORDER BY count(*) DESC

-- articles_publies_pigiste_stats()

SELECT MIN(freelances.sumFreelances) AS 'min', MAX(freelances.sumFreelances) AS 'max', ROUND(AVG(freelances.sumFreelances)) AS moy, SUM(freelances.sumFreelances) AS 'sum'
FROM (SELECT user.first_name as prenom, user.last_name as nom, COUNT(*) as 'sumFreelances' FROM articles
INNER JOIN user ON articles.id_user = user.id
WHERE YEAR(FROM_UNIXTIME(articles.date)) = pYear
AND user.rank > 0
GROUP BY user.id) AS freelances

-- articles_publies_region()

SELECT COUNT(*) AS 'nb', regions.name AS nom_region
FROM articles
INNER JOIN article_region ON articles.id = article_region.id_article
INNER JOIN regions ON article_region.id_region = regions.id
WHERE YEAR(FROM_UNIXTIME(articles.date)) = pYear
GROUP BY article_region.id_region
ORDER BY COUNT(*) DESC

-- articles_publies_region_stats()

SELECT MIN(regions.sumRegions) AS 'min', MAX(regions.sumRegions) AS 'max', ROUND(AVG(regions.sumRegions)) AS 'moy', SUM(regions.sumRegions) AS 'sum'
FROM (SELECT regions.name AS nom_region, COUNT(*) AS 'sumRegions' FROM articles
INNER JOIN article_region ON articles.id = article_region.id_article
INNER JOIN regions ON article_region.id_region = regions.id
WHERE YEAR(FROM_UNIXTIME(articles.date)) = pYear
GROUP BY article_region.id_region) AS regions



--------------------------------------------------------------------------------------------------------------------------------------------------



-- ANCIENNES PROCEDURES (obsolètes)


CREATE DEFINER=`root`@`localhost` PROCEDURE `get_articles_lus_tag_for_year`(IN `pYear` INT)

SELECT COUNT(*), tags.label
FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
WHERE YEAR(FROM_UNIXTIME(profile_article_read.creation_date)) = pYear
GROUP BY article_tag.id
ORDER BY COUNT(*) DESC



CREATE DEFINER=`root`@`localhost` PROCEDURE `get_articles_les_plus_lus_for_year`(IN `pYear` INT)

SELECT count(*) as nb, id_article FROM profile_article_read
WHERE YEAR(FROM_UNIXTIME(profile_article_read.creation_date)) = pYear
GROUP BY id_article
ORDER BY COUNT(*) DESC



CREATE DEFINER=`root`@`localhost` PROCEDURE `get_min_count_articles_for_year`(IN `pYear` INT)

       SELECT count(id), MONTH(FROM_UNIXTIME(date)) as mymonth
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = pYear
					GROUP BY MONTH(FROM_UNIXTIME(date))
                    ORDER BY count(*)

                    LIMIT 1


CREATE DEFINER=`root`@`localhost` PROCEDURE `get_max_count_articles_for_year`(IN `pYear` INT)

       SELECT count(id), MONTH(FROM_UNIXTIME(date)) as mymonth
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = pYear
					GROUP BY MONTH(FROM_UNIXTIME(date))
                    ORDER BY count(*) DESC

                    LIMIT 1

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_sum_articles_for_year`(IN `pYear` INT)

       SELECT AVG(*), COUNT(*)
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = pYear


CREATE DEFINER=`root`@`localhost` PROCEDURE `get_moy_count_articles_for_year`(IN `pYear` INT)

       SELECT count(id)
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = pYear
					GROUP BY MONTH(FROM_UNIXTIME(date))







  SELECT month_max.nb_articles, month_max.month_articles, 'max' as calcul
  FROM     (SELECT count(id) as nb_articles, MONTH(FROM_UNIXTIME(date)) as month_articles
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = 2018
					GROUP BY MONTH(FROM_UNIXTIME(date))
                    ORDER BY count(*) DESC
                    LIMIT 1) as month_max
UNION
  SELECT month_min.nb_articles, month_min.month_articles, 'min' as calcul
  FROM     (SELECT count(id) as nb_articles, MONTH(FROM_UNIXTIME(date)) as month_articles
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = 2018
					GROUP BY MONTH(FROM_UNIXTIME(date))
                    ORDER BY count(*) ASC
                    LIMIT 1) as month_min
      UNION
      SELECT count(*)/count(distinct MONTH(FROM_UNIXTIME(date))) as nb_articles, NULL as month_article, 'moyenne' as calcul
      FROM articles WHERE YEAR(FROM_UNIXTIME(date)) = 2018
      UNION
      SELECT COUNT(*) as nb_articles, NULL as month_article, 'somme' as calcul
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = 2018






	-- Elle marche pas --

                    CREATE FUNCTION get_min_count_articles_for_year (IN `pYear` INT)
RETURNS @TOTO TABLE ( nb_articles int null, mymonth int null)
AS
BEGIN

   INSERT INTO @TOTO

 SELECT count(id) as nb_articles, MONTH(FROM_UNIXTIME(date)) as mymonth
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(date)) = pYear
					GROUP BY MONTH(FROM_UNIXTIME(date))
                    ORDER BY count(*)

                    LIMIT 1
   RETURN
END---
























-- CREATE TABLE TMP_article_profile (id INT UNSIGNED PRIMARY KEY,year_article INT UNSIGNED);

-- INSERT INTO TMP_article_profile (SELECT id, YEAR(FROM_UNIXTIME(creation_date)) FROM profile_article_read);

CREATE INDEX TMP_article_profile_read_index_year ON TMP_article_profile (year_article);








-- DROP INDEX TMP_article_profile_read_index_year ON TMP_article_profile;
 -- DROP TABLE TMP_article_profile;

-- CREATE TABLE TMP_article_profile (id_article INT,year_article INT UNSIGNED);

-- INSERT INTO TMP_article_profile (SELECT id_article, YEAR(FROM_UNIXTIME(creation_date)) FROM profile_article_read);

-- CREATE INDEX TMP_article_profile_read_index_year ON TMP_article_profile (year_article);


SELECT count(*) as nb, id_article FROM TMP_article_profile
					 WHERE year_article = 2018
					group by id_article
					order by count(*) DESC










-- procédure qui marche pas pour refresh la table temporaire

BEGIN

CREATE TABLE TMP_article_profile (id_article INT,year_article INT UNSIGNED);

​

INSERT INTO TMP_article_profile (SELECT id_article, YEAR(FROM_UNIXTIME(creation_date)) FROM profile_article_read);

​

CREATE INDEX TMP_article_profile_read_index_year ON TMP_article_profile (year_article);

SELECT count(*) as nb, id_article FROM TMP_article_profile

                     WHERE year_article = pYear

                    group by id_article

                    order by count(*) DESC

END





			   -- DROP TABLE IF EXISTS TMP_article_region;

-- CREATE TABLE TMP_article_region (id_article INT, id_region INT, year_article INT UNSIGNED);



-- INSERT INTO TMP_article_region (SELECT id_article, id_region, regions.id FROM article_region LEFT JOIN regions ON article_region.id_region = regions.id);


-- CREATE INDEX TMP_article_region_index_year ON TMP_article_region (year_article);

SELECT count(*) as nb, id_article FROM TMP_article_region

			-- WHERE year_article = 2018

                   WHERE TMP_article_region.id_region = 2

                 group by id_region

               order by count(*) DESC















			   -- articles pour un tag
			   SELECT count(*) as nb_articles, tags.label as nom_tag FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN articles ON article_tag.id_article = articles.id



WHERE YEAR(FROM_UNIXTIME(articles.creation_date)) = pYear


GROUP BY article_tag.id_tag




--requête qui fait péter le serveur

SELECT count(*) as nb_articles, tags.label as nom_tag FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN articles ON article_tag.id_article = articles.id
INNER JOIN profile_article_read ON articles.id = profile_article_read.id_article



WHERE YEAR(FROM_UNIXTIME(profile_article_read.creation_date)) = 2018


GROUP BY article_tag.id_tag














-- requête qui retourne le nombre max d'articles lus par tag (crash le serveur lorsque l'on décommente le champ duration >= 30)

SELECT count(*) as nb_articles, tags.label as nom_label
         			FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article

                    WHERE YEAR(FROM_UNIXTIME(article_tag.creation_date)) = 2018
					-- AND profile_article_read.duration >= 30
					GROUP BY article_tag.id_tag
                    ORDER BY count(*) DESC

                    LIMIT 1








































-- Les PS ecomnews au 5 juillet 2018


-- afficher_articles_tag
SELECT count(*) as nb_articles, tags.label as nom_tag FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN articles ON article_tag.id_article = articles.id
WHERE YEAR(FROM_UNIXTIME(articles.creation_date)) = pYear
GROUP BY article_tag.id_tag

-- afficher_nb_articles_publies_par_mois
SELECT count(*) as 'nb', YEAR(FROM_UNIXTIME(publication_date)) as 'year',
    MONTH(FROM_UNIXTIME(publication_date)) as 'month'
    FROM articles
    WHERE YEAR(FROM_UNIXTIME(publication_date)) = pYear
    GROUP BY MONTH(FROM_UNIXTIME(publication_date))
    ORDER BY MONTH(FROM_UNIXTIME(publication_date))

-- articles_lus_client
SELECT count(*) as nb_articles, customers.company_name as nom_client
FROM article_tag
INNER JOIN customers ON article_tag.id_tag = customers.id_tag
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
WHERE TMP_article.year_article = pYear
AND duration >= 30
-- duration = 0 WARNING
-- AND pYear = 2018 AND month >=3
GROUP BY customers.company_name
ORDER BY nb_articles DESC

-- articles_lus_pigiste
SELECT count(*) as nb_articles, user.first_name as prenom, user.last_name as nom FROM user
INNER JOIN articles ON user.id = articles.id_user
INNER JOIN TMP_article ON articles.id = TMP_article.id_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND user.rank > 0
AND profile_article_read.duration >= 30
GROUP BY prenom
ORDER BY nb_articles DESC
-- LIMIT 10

-- articles_lus_tag
SELECT count(*) as nb_articles, tags.label as nom_tag
FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article
WHERE TMP_article.year_article = pYear
-- AND duration >= 30
-- duration = 0 WARNING
-- AND pYear = 2018 AND month >=3
GROUP BY article_tag.id_tag
ORDER BY nb_articles DESC
LIMIT 12

-- articles_publies_pigiste
SELECT count(*) as nb_articles, user.first_name as prenom, user.last_name as nom FROM articles
INNER JOIN user ON articles.id_user = user.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND user.rank > 0
GROUP BY user.id
ORDER BY nb_articles DESC

-- articles_publies_tag
SELECT count(*) as nb_articles, tags.label as nom_tag
FROM articles
INNER JOIN article_tag ON articles.id = article_tag.id_article
INNER JOIN tags ON article_tag.id_tag = tags.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY article_tag.id_tag
ORDER BY nb_articles DESC
LIMIT 12

-- classement_articles_les_plus_lus
SELECT count(*) as nb, articles.title as articles
FROM TMP_article
INNER JOIN profile_article_read
ON TMP_article.id_article = profile_article_read.id_article
INNER JOIN articles ON profile_article_read.id_article  = articles.id
					  WHERE TMP_article.year_article = pYear
                      AND profile_article_read.duration >= 30
                      group by profile_article_read.id_article
                      order by nb DESC
                      LIMIT 10

-- get_articles_les_plus_lus_for_year
SELECT count(*) as nb, id_article
FROM TMP_article
INNER JOIN profile_article_read
ON TMP_article.id_article = profile_article_read.id_article
					WHERE year_article = pYear
					group by profile_article_read.id_article
					order by nb DESC

-- get_max_count_articles_for_year
SELECT count(id) as nb, MONTH(FROM_UNIXTIME(publication_date)) as mymonth
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(publication_date)) = pYear
					GROUP BY MONTH(FROM_UNIXTIME(publication_date))
                    ORDER BY count(*) DESC
                    LIMIT 1

-- get_max_count_articles_lus_pigiste
SELECT count(*) as nb_articles, user.first_name as prenom, user.last_name as nom FROM articles
INNER JOIN user ON articles.id_user = user.id
INNER JOIN TMP_article ON articles.id = TMP_article.id_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND profile_article_read.duration >= 30
GROUP BY prenom
ORDER BY count(*) DESC
LIMIT 1

-- get_max_count_articles_lus_tag_for_year
SELECT count(*) as nb_articles, tags.label as nom_label FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article WHERE YEAR(FROM_UNIXTIME(article_tag.creation_date)) = pYear
-- AND profile_article_read.duration >= 30
GROUP BY article_tag.id_tag ORDER BY count(*) DESC LIMIT 1

-- get_max_count_articles_publies_pigiste
SELECT count(*) as nb_articles, user.first_name as prenom, user.last_name as nom FROM articles
INNER JOIN user ON articles.id_user = user.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY prenom
ORDER BY count(*) DESC
LIMIT 1

-- get_max_count_articles_publies_tag_for_year
SELECT count(*) as nb_articles, tags.label as nom_tag FROM articles
INNER JOIN article_tag ON articles.id = article_tag.id_article
INNER JOIN tags ON article_tag.id_tag = tags.id

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY article_tag.id_tag
ORDER BY count(*) DESC LIMIT 1

-- get_min_count_articles_for_year
SELECT count(id) as nb, MONTH(FROM_UNIXTIME(publication_date)) as mymonth
         			FROM articles
                    WHERE YEAR(FROM_UNIXTIME(publication_date)) = pYear
					GROUP BY MONTH(FROM_UNIXTIME(publication_date))
                    ORDER BY count(*)

                    LIMIT 1

-- get_min_count_articles_lus_pigiste
SELECT count(*) as nb_articles, user.first_name as prenom, user.last_name as nom FROM articles
INNER JOIN user ON articles.id_user = user.id
INNER JOIN TMP_article ON articles.id = TMP_article.id_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND profile_article_read.duration >= 30
GROUP BY prenom
ORDER BY count(*)
LIMIT 1

-- get_min_count_articles_lus_tag_for_year
SELECT count(*) as nb_articles, tags.label as nom_label FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article
WHERE YEAR(FROM_UNIXTIME(article_tag.creation_date)) = pYear
-- AND profile_article_read.duration >= 30
GROUP BY article_tag.id_tag
ORDER BY count(*)

LIMIT 1

-- get_min_count_articles_publies_pigiste
SELECT count(*) as nb_articles, user.first_name as prenom, user.last_name as nom FROM articles
INNER JOIN user ON articles.id_user = user.id

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY prenom
ORDER BY count(*)
LIMIT 1

-- get_min_count_articles_publies_tag_for_year
SELECT count(*) as nb_articles, tags.label as nom_tag FROM articles
INNER JOIN article_tag ON articles.id = article_tag.id_article
INNER JOIN tags ON article_tag.id_tag = tags.id

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY article_tag.id_tag
ORDER BY count(*)

LIMIT 1

-- get_moy_count_articles_for_year
SELECT ROUND(count(*)/count(distinct MONTH(FROM_UNIXTIME(publication_date)))) as nb FROM articles WHERE YEAR(FROM_UNIXTIME(publication_date)) = pYear

-- get_moy_count_articles_lus_pigiste
SELECT ROUND(count(*)/count(distinct user.last_name)) as nb_articles FROM articles
INNER JOIN user ON articles.id_user = user.id
INNER JOIN TMP_article ON articles.id = TMP_article.id_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND profile_article_read.duration >= 30

-- get_moy_count_articles_lus_tag_for_year
SELECT ROUND(count(*)/count(distinct tags.label)) as nb_articles
FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article
WHERE YEAR(FROM_UNIXTIME(article_tag.creation_date)) = pYear
-- AND profile_article_read.duration >= 30

-- get_moy_count_articles_publies_pigiste
SELECT ROUND(count(*)/count(distinct user.last_name)) as nb_articles FROM articles
INNER JOIN user ON articles.id_user = user.id

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear

-- get_moy_count_articles_publies_tag_for_year
SELECT ROUND(count(*)/count(distinct tags.label)) as nb_articles
FROM articles
INNER JOIN article_tag ON articles.id = article_tag.id_article
INNER JOIN tags ON article_tag.id_tag = tags.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear

-- get_sum_articles_for_year
SELECT COUNT(*) as nb
FROM articles
WHERE YEAR(FROM_UNIXTIME(publication_date)) = pYear

-- get_sum_articles_lus_pigiste
SELECT count(*) as nb_articles FROM articles
INNER JOIN user ON articles.id_user = user.id
INNER JOIN TMP_article ON articles.id = TMP_article.id_article
INNER JOIN profile_article_read ON TMP_article.id_article = profile_article_read.id_article

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear

AND profile_article_read.duration >= 30

-- get_sum_articles_lus_tag_for_year
SELECT count(*) as nb_articles
FROM article_tag
INNER JOIN tags ON article_tag.id_tag = tags.id
INNER JOIN profile_article_read ON article_tag.id_article = profile_article_read.id_article
INNER JOIN TMP_article ON article_tag.id_article = TMP_article.id_article
WHERE YEAR(FROM_UNIXTIME(article_tag.creation_date)) = pYear
-- AND profile_article_read.duration >= 30 GROUP BY article_tag.id_tag
-- ORDER BY count(*) DESC LIMIT 1

-- get_sum_articles_publies_pigiste
SELECT count(*) as nb_articles FROM articles
INNER JOIN user ON articles.id_user = user.id

WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
AND user.rank > 0

-- get_sum_articles_publies_tag_for_year
SELECT count(*) as nb_articles
FROM articles
INNER JOIN article_tag ON articles.id = article_tag.id_article
INNER JOIN tags ON article_tag.id_tag = tags.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
-- AND profile_article_read.duration >= 30 GROUP BY article_tag.id_tag
-- ORDER BY count(*) DESC LIMIT 1

-- update_tmp_article_profile
BEGIN
-- DROP INDEX TMP_article_profile_read_index_year ON TMP_article_profile;
 -- DROP TABLE TMP_article_profile;
-- CREATE TABLE TMP_article_profile (id_article INT,year_article INT UNSIGNED);
-- INSERT INTO TMP_article_profile (SELECT id_article, YEAR(FROM_UNIXTIME(creation_date)) FROM profile_article_read);
-- CREATE INDEX TMP_article_profile_read_index_year ON TMP_article_profile (year_article);
-- CREATE TABLE TMP_article (id_article INT, year_article INT UNSIGNED, month INT UNSIGNED);
-- INSERT INTO TMP_article (SELECT id, YEAR(FROM_UNIXTIME(publication_date)), MONTH(FROM_UNIXTIME(publication_date)) FROM articles);
-- CREATE INDEX TMP_article_index_year ON TMP_article (year_article);
-- CREATE INDEX TMP_article_index_id ON TMP_article (id_article);
TRUNCATE TABLE TMP_article;
INSERT INTO TMP_article (SELECT id, YEAR(FROM_UNIXTIME(publication_date)), MONTH(FROM_UNIXTIME(publication_date)) FROM articles);
END


-- Nombre d’articles par client à partir de son tag associé

SELECT count(*) as nb, customers.company_name as nom_client FROM customers
INNER JOIN article_tag ON customers.id_tag = article_tag.id_tag
INNER JOIN articles ON article_tag.id_article = articles.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = 2018
GROUP BY customers.company_name
ORDER BY count(*) DESC
LIMIT 10


-- Liste des articles publiés pour chaque client en utilisant la liste des articles clients associés

SELECT count(*) as nb, customers.company_name as nom_client FROM articles
INNER JOIN article_customer ON articles.id = article_customer.id_article
INNER JOIN customers ON article_customer.id_customer = customers.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = pYear
GROUP BY customers.company_name
ORDER BY count(*) DESC
LIMIT 10


CREATE INDEX id_user ON minichat (id);
alter table minichat add column id_user Int NOT NULL
alter table minichat add constraint minichat_user_FK FOREIGN KEY (id_user) REFERENCES user (id)


alter table minichat add constraint minichat_user_fk FOREIGN KEY (id_user) REFERENCES USER (id)



-- Trouver les articles par article_customer qui n’ont pas les tags dans l’article

SELECT articles.id, articles.title FROM articles
INNER JOIN article_customer ON articles.id = article_customer.id_article
INNER JOIN customers ON article_customer.id_customer = customers.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = 2018
AND articles.id NOT IN (
SELECT articles.id FROM customers
INNER JOIN article_tag ON customers.id_tag = article_tag.id_tag
INNER JOIN articles ON article_tag.id_article = articles.id
WHERE YEAR(FROM_UNIXTIME(articles.publication_date)) = 2018
)
