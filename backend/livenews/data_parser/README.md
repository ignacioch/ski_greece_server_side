Description
============

Scripts in this folder parse the sources that provide the info and update the relevant DB entries with the new information. Beside that each script :

	* before checking for the lifts and tracks, stores the previous information
	* after fetchign the new condition, it decides whether it should send a notification or not
	* notifications are sent through PARSE REST API
	* (TBD) creates a log file with the log messages - log file can be accessible anytime and informs with the latest update of the app.

Special Notes
---------------

### Karpenisi :

We still have 4 lifts. Snowreport reports now 5, but we haven't added the 5th yet.

### Parnassos :

Total lifts : 16. There are some differences between the 2013-14 lifts names and the 2014-15. The database we are using, is the old one therefore we need to adjust the script into it. Conventions used are :

	* Τηλέμαχος does not exist anymore. Therefore it needs to stay closed.
	* Αφροδίτη Τηλεκαμπίνα (Βάκχος) (8-θέσιος Εναέριος) does not exist in the DB. Therefore we do not include that in the script.
	* Sahara (Μονοθέσιος Συρόμενος) does not exist in the DB. Therefore we do not include that in the script.
	* Baby lift 4 (Μονοθέσιος Συρόμενος) does not exist in the DB. Therefore we do not include that in the script.

Total tracks : 19. There are some differences between the 2013-14 lifts names and the 2014-15. The database we are using, is the old one therefore we need to adjust the script into it. Conventions used are :

	* Τηλέμαχος (No 3) does not exist anymore. Therefore it needs to stay closed.
