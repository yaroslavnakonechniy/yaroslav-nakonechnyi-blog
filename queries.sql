-- get categories with posts;

SELECT c.name, p.name
FROM category AS c
         JOIN category_post_author AS cp
             on c.category_id = cp.category_id
         JOIN post p
             on cp.post_id = p.post_id;

-- get authors with posts;

SELECT DISTINCT a.firstname, a.lastname, p.name
FROM post AS p
         JOIN category_post_author ap on p.post_id = ap.post_id
         JOIN author a on a.author_id = ap.author_id;

-- get Category/Post/Author by ID;

SELECT *
FROM category
WHERE category_id = 3;

-- get Category/Post/Author by URL;

SELECT *
FROM category
WHERE url = 'sport';

-- get Posts by Category;

SELECT DISTINCT c.name,  p.name
FROM category AS c
         JOIN category_post_author cp on c.category_id = cp.category_id
         JOIN post AS p on cp.post_id = p.post_id
WHERE c.name = 'Sport';

-- authors sorted by number of posts (highest to lowest);

SELECT a.firstname,
       COUNT(a.firstname) as count_post
FROM post AS p
         JOIN category_post_author ap on p.post_id = ap.post_id
         JOIN author a on a.author_id = ap.author_id
GROUP BY a.firstname
ORDER BY count_post DESC;

-- categories with the highest number of authors;

SELECT a.firstname, c.name, p.name

FROM post AS p
         JOIN category_post_author ap on p.post_id = ap.post_id
         JOIN author a on a.author_id = ap.author_id
        JOIN category c on ap.category_id = c.category_id;
