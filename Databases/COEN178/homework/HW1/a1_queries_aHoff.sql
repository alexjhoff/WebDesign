
//1
SELECT NAME 
FROM MealItem order by PRICE;

//2
SELECT NAME 
FROM MealItem order by PRICE, CALORIES;

//3
SELECT name
FROM mealitem
WHERE itemId in(SELECT itemid
	      FROM MealMenu
	      WHERE mealType = 'L');

//4
SELECT mealType, COUNT(1)
FROM mealMenu
GROUP BY mealType
HAVING COUNT(1) = (SELECT MAX(mc)     
			FROM (SELECT mealType, COUNT(1)MC  
				FROM mealMenu
				GROUP BY mealType)
);

//5
UPDATE MEALITEM
SET PRICE = PRICE * 1.05
WHERE EXISTS (SELECT ITEMID 
	      FROM MEALMENU 
	      WHERE MEALITEM.itemid = MealMenu.itemid);


//6

//7


//8
SELECT DISTINCT acctID, phone
FROM Customer
WHERE phone in (SELECT phone 
		FROM Customer 
		GROUP BY phone 
		HAVING count(phone)>1);



select name
from members
where memberid = (select memberid  
		from scores
		where sportname = 'soccer' and score >= all (select score 
							    from scores
								where sportname = 'soccer'));


select sportname, count(*)
from scores
group by sportname
having count(*) > (select count(*)
		  from scores
		  where sportname = 'football'
		  group by sportname);


select distinct sportname
from scores
where (select sportname, count(*)
      from scores
      group by sportname
      having count(*) > all (select count(sportname)
	      from scores
	      where sportname = 'football'
	      group by sportname));