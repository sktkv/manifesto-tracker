## Bharavase

### What is this?
Bharavase means ‘trust’ in Kannada. This website is a way for us to hold governments accountable, by checking on the progress they’ve made on their electoral promises. The larger ambition is to re-align those in power to democratic principles of transparency, participation and equity, and to re-orient citizens to judging their leaders by tangible metrics rather than jingoism. 

### Who can use this? 
The website allows for two use cases, admin and citizen. The admin can add and edit promise statuses and the citizen can view and comment on them.  

### Where's the database?
I've used XAMPP and MySQL for this. The database can be downloaded from manifeso.sql

### How do you use it?
#### Use Case: Citizen 
A non-registered user first enters the homepage. On the left is a dynamic pivot table and pie chart summarising the statuses of the manifesto promises given. It tracks how many promises have been fulfilled, how many are currently in progress, how many are yet to start, how many are broken, and how many have been stalled. Above the charts is a counter of the number of days the current government has been in power. 

<p align="center">
<img width="572" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/3fab1c4a-0519-49ea-a9d9-e8fc55c5dee1">
</p>

Below the data summary section is a table with each promise listed out and colour-coded according to the current status of the promise. The date column indicates the last date of updates. Clicking on ‘Details’ on each promise row takes the user to the promise-specific page, which lists down the name of the promise, status, last update, and other details. 

<p align="center">
<img width="523" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/7730def9-5982-424b-90e9-80eb5c81d84c">
</p>

<p align="center">
<img width="622" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/ac937c05-38ca-4af1-826c-1ff2b5570b8e">
</p>

#### Use Case: Website Admin
The website admin can log in through the admin login page. 
<p align="center">
 <img width="622" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/c8cd3094-2350-403c-bb42-91875ca73af5">
</p>

This will take the admin to the admin version of the home page, with the same data visualisations and pivot tables, but a slightly different table. 

<p align="center">
 <img width="622" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/1417ec58-7330-4cb3-a401-089884aa1782">
</p>

<p align="center">
<img width="662" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/7bf760c6-19d1-49f0-8ada-d080a809adfe">
</p>

The admin promise table has an extra column titled ‘Edit’. Clicking the values underneath it corresponding to promises will take the admin to promise-specific edit pages. 

In a promise-specific edit page, the admin can view the values already entered for each column and make changes or updates where necessary. A good practice would be to change the date each time changes are made, so that users can see when the last update was made.

<p align="center">
<img width="673" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/592a74e7-02d3-4468-8889-fdbd2bb5aaff">
</p>

Admins can click on ‘new entry’ on the top-right of the header on the admin home page. to reach a form to add new promises. Admins can enter values. Submitting the form will allow data to populate the data at the backend. 

<p align="center">
<img width="545" alt="image" src="https://github.com/sktkv/manifesto-tracker/assets/135432230/94c8e8c1-29fa-4468-bc45-4941743bd3a9">
</p>



