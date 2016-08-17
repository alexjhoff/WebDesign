SELECT custId, CONCAT(first_name,last_name) fullname, city
FROM Customers;

SELECT custId, first_name, last_name, city
From Customers
ORDER BY last_name;

SELECT serviceId, custId, Sday
From Schedule 
ORDER BY serviceId, custId DESC;

SELECT serviceid
FROM DeliveryService
WHERE serviceid not in(SELECT serviceid FROM Schedule);

Select first_name, last_name
From customers,schedule
where sday = 'm' and customers.custid = schedule.custid;

Select last_name
From Customers, DeliveryService, Schedule
where DeliveryService.serviceID = schedule.serviceid 
and schedule.custId = customers.custid;

Select Max(serviceFee) Highest_service
FROM deliveryService;

Select distinct sday, count(serviceId)
from schedule
group by sday;

Select A.custid, B.custid, A.city
From Customers A, Customers B
Where A.city = B.city and A.custid != B.custid;

Select First_name,last_name
From customers, deliveryservice,schedule
Where schedule.serviceid = deliveryservice.serviceid 
and customers.city = deliveryservice.location 
and customers.custid = schedule.custid;



