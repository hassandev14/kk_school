SELECT IFNULL(COUNT(id),0) AS admission,YEAR(admission_date) AS `year`
FROM students
GROUP BY admission_date 
ORDER BY `year` DESC
LIMIT 5