## GitHubStats

At 40 million users across the world and 100 million repositories, GitHub is one of the most popular
version control and project management platforms. Although it provides some general statistics on
individual repository pages (new issues, closed issues, pull requests, languages used in the repository,
contributors, etc.), currently there is no convenient way to look at real-time commit statistics across
repositories of different users at a glance. GitHub does support a well-developed public API to extract
information across many repositories for further analysis. For this project, our group will use GitHub API
to extract useful statistics on commits for repositories of all public users located in Ontario, Canada as a
convenient tool to peek at current GitHub activity in this geographic region.  


### Goals and Motivations:  

The goal of this project is to create a simple database web application that will query, store, analyze and
render current GitHub commit statistics using GitHub public REST API. The application will focus on
sorting and pulling commit statistics from public repositories of users located in Ontario, Canada from the
past year. This data will be analyzed for the following metrics: which months and days of the week and
hours of the day have the most commits, most commonly used programming languages, and the
categories of software products these commits represent (web applications, system utilities, big data tools,
etc.).  

Our main motivation for this project is to develop a practical data-driven tool for quantifying trends in
software development that will be implemented using tools and technologies covered in this course, such
as a database management system, database design process, SQL query language, data flow in RESTful
web services etc. Through this, we hope to demonstrate our understanding of the course material and our
ability to apply it in a real small-scale solution.  

### Methodology & Plan:   

Our group will approach this project in a step-by-step fashion, starting with developing the database
design, retrieving data from Github using GitHub public REST API, creating and populating the database
in SQLite, creating a presentation web layer and querying the database for statistics to display, etc. We
will be meeting weekly to assign work for each member and discuss progress and problems. We will be
using GitHub public REST API, SQLite with SQL, and HTML/CSS/PHP. We will be extracting GitHub
data on commits as it is the most accurate metric of repository activity. Our project is limited to public
repositories of users located in Ontario, Canada and their commit activity from October 2018 to October
2019.  

### Related Work:  

https://github.com/marketplace/circleci  

CircleCi is an application that uses Github API for project teamwork. It speeds up the test and delivery
cycle without running your own infrastructure by showing workflow status, related jobs with the Insights
functionality, and performance trends.  

https://github.com/marketplace/zenhub  

ZenHub uses Github API and integrates natively with Githubs user interface. It has a Multi-Repo Task
Board that lets the team visualize issues and group them in epics, track dependencies and collaborate on
product backlogs. Zenhub can also release reports, use the history of reports to detect trends to improve
processes, increase team efficiency and measure the value delivered to end-users.
Our project differs from the above applications because it does not focus on the functionality of a single
repository. Instead we deliver statistical insights on user commit activity for many repositories as a
quantification tool of trends in development process for various types of software technologies.
