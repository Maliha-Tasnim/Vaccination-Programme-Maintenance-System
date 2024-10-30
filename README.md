# Vaccination Programme Maintenance System

The purpose of this project is to develop an advanced vaccination program scheduler which would support child registration system. It is an automation process for the nationwide (country- Bangladesh) child vaccination program through a web-based MIS (Management Information System) software. 

## Requirements of the Project

The core objectives is ensuring proper monitoring, accountability, and transparency in the vaccination framework in order to increase the rate of vaccinated children in Bangladesh. The automation process, aimed towards continuous holiday updates for vaccination schedule, rendered the expanded programme on immunization (EPI) micro-plan easier than the previous manual one. The application is capable of effectively producing vaccination statistics from all the administrative units (Unions, Upazilas, Districts, and Divisions) in Bangladesh. 

## Tools & Technologies

For the front-end development HTML, CSS, Bootstrap, JavaScript, AJAX, jQuery, and XML are used. For the back-end development PHP and MySQL are used. To put all these into effect a range of integrated development environments and editors like PhpStorm, Sublime Text, and XAMPP are used. Finally a database is developed using MySQL in order to store all the necessary information like EPI centres’ details, upcoming holiday events, possible vaccination slots, etc. Keeping the importance of public-private partnership in mind, this project ensure the full coverage of nationwide vaccination programmes through proper monitoring - from the root level to the top administration.

## Project Demo



https://github.com/Maliha-Tasnim/Vaccination-Programme-Maintenance-System/assets/40670215/f9454497-7efc-4cbf-8e18-89cd05928f13





## Application Features

The homepage of the application looks like following:

![image](https://github.com/user-attachments/assets/d730cdea-8527-4258-bb65-758bf18353a6)


There are three different kind of user permission and each of the user has some limitation of accessing the features of the applications. These are:

  1. System Administration
  2. DGHS Administration
  3. Health Assistant


At the beginning phase of the application there will be no Health Assistant permission. Because, until uploading the EPI Centers information no health assistant permission or users will be created. So very first step has to do by system administration and DGHS administration. However, the System Administration has all the features permission to access, so the rest of the context is being written as login as System Administration. In addition, at the end of this, different features list has also given for different users permission. After successful login as a System Administration, the following page is being shown. It is
some default page with fewer information about EPI.

![image](https://github.com/user-attachments/assets/323a7682-074d-44d6-940a-1d0f4ca47bb6)



![image](https://github.com/user-attachments/assets/feff7bff-21a1-4e1a-a2ab-c272df3b2927)



### Dashboard

The very first menu option of web based EPI Scheduler application is Dashboard. Basically, a dashboard menu option is a default page where different kind of information is being shown. Initially at this page, all the statistics of Division, District, Upazila, Union is zero, as no data is uploaded. After uploading the data, the dashboard will show the proper statistics.

![image](https://github.com/user-attachments/assets/226486ea-0d3d-4cc0-af87-b55b5447b27c)


### Upload Data

Then the next menu option is Upload Data. Under this option there are five different sub menu options. These are:
  1. Upload Division List: This sub menu option is for uploading division list of Bangladesh as a CSV file.
  2. Upload District List: This sub menu option is for uploading district list of Bangladesh as a CSV file.
  3. Upload Upazila List: This sub menu option is for uploading upazila list of Bangladesh as a CSV file.
  4. Upload Union List: This sub menu option is for uploading Union list of Bangladesh as a CSV file.
  5. Upload EPI Center List: This sub menu option is for uploading EPI Centers information for a particular union. Based on uploaded information, there are some options which leads to set a EPI Schedule for          that particular union.


![image](https://github.com/user-attachments/assets/054d2136-9a44-4092-b042-88d7b642350e)



### Government Holiday Scheduler

The next menu option is Government Holiday Scheduler. Under this menu options there are two sub menu options.

  1. Create Holiday Schedule: This sub menu option is for to add govt. declared holiday list for a particular year. This is need for to make EPI Schedule accurate. Because, EPI Sessions for a union does not hold       on govt. holidays and weekends.
  2. View Holiday Schedule: This sub menu option is to view the existing government holiday list. So, if there any necessary to change or modify the government holiday list for a particular year, the
     system admin can do it.

The Government Holiday Scheduler panel allows the user to create and view government holidays after entering the particular year from a drop-down box. Thus any holidays can be searched, added, deleted from this panel. The vaccination program is observed by maintaining three different day slots- Monday-Thursday, Sunday-Thursday and Saturday-Tuesday.

![image](https://github.com/user-attachments/assets/918683ae-b34a-4ce3-aaed-f0d9f7e4e982)


### EPI Session Schedule

The next menu option is EPI Session Scheduler. In this menu option there are five sub menu options. These are:

  1. Create Mon-Thu Schedule: This sub menu option is for creating Monday-Thursday EPI Schedule for whole country for a particular year based on govt. holiday lists. There are some review and recheck option 
     while creating this specific EPI Session Schedule.
  2. Create Sun-Wed Schedule: This sub menu option is for creating Sunday-Wednesday EPI Schedule for whole country for a particular year based on govt. holiday lists. There are some review and recheck option 
     while creating this specific EPI Session Schedule.
  3. Create Sat-Tue Schedule: This sub menu option is for creating Saturday-Tuesday EPI Schedule for whole country for a particular year based on govt. holiday lists. There are some review and recheck option 
     while creating this specific EPI Session Schedule.
  4. View EPI Schedule: This sub menu option is for view EPI Session Schedule for a particular year. So, if there is any further modification needed then system admin or DGHS admin can do it.

The following panel enables the user to create schedule for a particular slot after entering a specific year and slot:

![image](https://github.com/user-attachments/assets/20c28198-eff1-464a-a803-3f2c91682ac5)




The vaccination routine is continued by maintaining a gap of 28-35 days in the process. By observing the government holidays from the panel and vaccination routine this session scheduler will create the EPI schedule for a particular slot.

### EPI Center Scheduler

The next menu option is EPI Center Scheduler. There are four different sub menu options under this menu. These are:

  1. View Center Scheduler: This sub menu option is for just view a particular union’s EPI Center information. Like, the name of EPI Centers, EPI Session Details, Health Assistant details etc.
  2. Modify Center Scheduler: This sub menu option is for view a particular union’s EPI Center information but from here the system admin or health assistant can modify it according his/her emergency situations.
  3. Change Center Scheduler: From this sub menu option the system admin or health assistant can change the EPI Session Schedule for a particular year. For example, if a union’s EPI Session Schedule for year     
     2018 is Monday-Thursday. But, it should be change to Sunday-Wednesday for year 2019. Then, this sub menu option can be a way to do that.
  4. Year Wise Scheduler: In this sub menu option a health assistant or system admin can create a new EPI Session Schedule for upcoming year. But before do this, they have to update government holiday list for 
     that year first. Year wise schedule can also be generated from this module as government holidays are stored in the database for previous and some upcoming years. The following panel allows the user to view 
     the EPI schedule for a particular Union after entering the data of Division, District, Upazila, Union and year from drop down menu. This schedule can be further modified or changed from the panel.


![image](https://github.com/user-attachments/assets/ac17dc2a-1e6d-44bc-8ea0-8d1c30e4376e)


### Rechange EPI Schedule

This menu option is for emergency situation. Like, if there any need to change all of the EPI Center’s Session Schedule at the middle of the year, then this will be a helpful thing to rechange all the EPI Session Schedule just few mouse clicks. The follwong panel demonstrates the partial view of the change schedule page:

![image](https://github.com/user-attachments/assets/5dabd727-2389-4f65-9604-f8f146e59eb8)


### Print EPI Schedule

This menu option is for to print existing EPI Centers information with current EPI Schedule for printing the hard copy. The following panel demonstartes the partial view of the print EPI schedule page:

![image](https://github.com/user-attachments/assets/66fdf15d-a9db-413e-9ad4-f6f93b293ef3)


### Child Information

After uploading the EPI center info it will automatically generate the user id and password for each ward. This user id and password will be needed later on for store child registration information. There are two sub menu options under this menu option. These are:

  1. Registration: This sub menu option is basically for health assistants. To make their regular job hassle free this would be a helpful option. Using Registration sub menu option, a health assistant can 
     register a child under his ward for a particular union. This registration will help to keep child record for EPI vaccination statistics.
  2. Modification: This sub menu option is use for modify a child record. Using a unique ID a health assistant easily can access a child profile to update their vaccine date and relevant comment for proper 
     vaccination statistics nationwide.

Child registration data and vaccination information are stored in the child information system. All the necessary information about a child will be provided through this panel. Vaccines that are received as well as that are pending is also shown by the panel. Individual child information along with the vaccines status will be generated by this panel through the child unique id. The following two panel illustrates the child registration page and child information modification page simultaneously:


![image](https://github.com/user-attachments/assets/b9685e45-db52-4e54-a645-9caceffce2f6)


![image](https://github.com/user-attachments/assets/e544cc56-e2d8-469e-b295-4494873ab5de)


### Vaccine Statistics

All the necessary information about a child will be provided through this panel. Vaccines that are received as well as that are pending is also shown by the panel. Individual child information along with the vaccines status will be generated by this panel through the child unique id. User can view division, district, upazila, union and epi center wise vaccination status. This panel enable us to store the vaccination statistics through all over the country. The following panels demonstartes the vaccine statisctics of the country:

![image](https://github.com/user-attachments/assets/403dfaec-8469-4890-ba7b-599efeb20465)

### User Management

This menu option is for to manage all the users whom are registered for this application. If there any situation occurs to change or delete a user from the central database, the system admin or DGHS admin can easily do that from here.

![image](https://github.com/user-attachments/assets/d3c276cd-eec7-4d24-964b-657ebcdf590b)


### Important Links

Some important links, which are very relevant to EPI will show here. To access proper information in any circumstances, a user can easily find those links.

### Bugs & Reports

This menu option is for user perspective only. If any user of this application can find any bugs or issues, they can report it here. Based on those reports, the developers team can fix those bugs or issues easily.

![image](https://github.com/user-attachments/assets/6bf853b1-1219-4aaa-8fa1-fed4a9dc5fa1)


### Application Workflow

After login to the dashboard one need to upload the excel file of division, district, upazila, union first. After that, it is required to upload the government holiday through excel file in the software. One must follow this sequential otherwise system will not work properly.

![image](https://github.com/user-attachments/assets/f9abdd61-aa04-4576-854f-1ead517397f4)

















