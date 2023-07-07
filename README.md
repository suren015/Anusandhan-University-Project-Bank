

  <h1 align="center" id = "top"><b>ANUSANDHAAN</b></h1>

  <p align="center">
    Installation guide for the project
   </p>
</div>

<br>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#prerequisites">Setting up the Project</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>

  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

Anusandhaan is a university project bank management system that allows the students and the admins to contribute to the academic workspace. It is a place for students to submit their project reports and get them verified by the administration. Upon verification, the project report is added into the repository for future use and can be accessed by other students as per need.

You might be wondering why is this required ? Here's why, 
* Relevant projects for students are tough to get, since vast search results on the internet, But our software provides them only relevant projects as desired by the administration.
* General searching is tedious with inefficient results, but our software gives brief abstracts and introduction of the project which helps the student get an insight.
* In the website, all the information is filled by the student while requesting approval and the admin can find that all at one place
* At each step of the project, for every major action an auto generated email is sen to the student at their registered email id which enables prompt and reliable communication.


<p align="right">(<a href="#top">back to top</a>)</p>



## Built With

* php
* mysql
* html
* css
* javascript


<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To set up the project locally follow the steps mentioned below.

### Prerequisites

* Install MySQL from the oracle website
* Install XAMPP: 
   - configure it so that it uses different port that the MySQL.
   - Add relevant files to the enironment variable.
   

### Setting up the Project

   * Download the ZIP file and unzip it on the local machine.
   * To get started, open XAMPP and start the apache server and the mysql in it. Go to phpmyadmin localhost and create a new database with the name of your choice say `database-name`. Go to `import` and upload the `query.sql` file from the project files.
   * Go to the `config.php` file and change the details of the fields  `your-username`, `your-password` and `your-database-name` to your `mysql-username`, `mysql-password` and the `database-name` that you created in phpmyadmin respectively :
   
   ```   
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'your-username');
      define('DB_PASSWORD', 'your-password');
      define('DB_NAME', 'your-database-name');
   ```
   
<p align="right">(<a href="#top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->
## Usage

After the completion of the above steps, your project is ready to run.
To run the project, open a browser and type
```http://localhost:3000/index.php```

### The following homepage can be found : 

![Anusandhaan](https://user-images.githubusercontent.com/65289620/236695079-7e198494-4a13-4fe1-97e1-e5012ce7dd80.png)

### **NOTE : Initially the database will be empty, so you need to populate it from scratch.**

Go to the login page and click on `register` and create a new user for both student and admin and you are good to go.
Explore the other features. Some of them are : 


The student can : 
   * Request to upload a project report.
   * Check the status of their request and view all the accepts, rejects and pending projects.
   * Give feedback.
   * Search for already accepted project reports.
 
The admin can : 
   * Check all the pending projects reports.
   * View a breif description about each of them.
   * Download the main file.
   * Accept / Reject the project upload request. 
   * Search for already accepted project reports.
    
   
 The search functionality works in the following manner : <br>
 ![ezgif com-video-to-gif (1)](https://user-images.githubusercontent.com/65289620/236695516-beee4b56-4c90-4354-88f5-a48fbd205608.gif)
 <br><br>
 You can click on the search results and get a brief description of the project and a download option. <br>
![after_clicking_on_search_result_or_in_token_check_page](https://user-images.githubusercontent.com/65289620/236695681-eaa79780-3b29-4a0d-a974-ef2770d21aba.png)
 <br><br>
You can also check the status of your projects : <br>
![tokenStatusPage](https://user-images.githubusercontent.com/65289620/236695737-0312634a-6ecb-4fef-b07c-1074d84a2fda.png)
 <br><br>
 
Find out more about the other features by exploring the project!!
<p align="right">(<a href="#top">back to top</a>)</p>

