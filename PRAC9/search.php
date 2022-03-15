<?php
	#search for books by SAID author
SELECT title FROM books WHERE author = "$author";
	#word search for any book that has the term in its title
SELECT title,author FROM books WHERE title LIKE "%$searchTERM%";
	#search for books that have a term to show what genre it is in
SELECT title, author FROM books INNER JOIN booktags ON books.id=booktags.id WHERE tag = "$searchTERM"; 
	#have a function that displays the number of books that are found for a tag, assuming that each book only has one tag for each book
SELECT COUNT(tags) FROM booktags WHERE tag = "$tag";
print(); 

	# lists all the titles and authors of bokos that have the tag 
SELECT title,author FROM books INNER JOIN booktags ON books.id=booktags.id WHERE tag = "";

	

?>
