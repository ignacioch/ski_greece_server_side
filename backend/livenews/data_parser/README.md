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
