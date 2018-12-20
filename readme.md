# Project 4
+ By: Haogang Su
+ Production URL: http://laravel.ceeker.me/

## Database
*The following is example info taken from Foobooks; delete and replace with your own info.*

Primary tables:
  + `courts`
  + `players`

  
Pivot table(s):
  + `court_player`


## CRUD
*Describe what action I need take in order to see an example of all 4 CRUD operations in your app. I've filled this out with examples from the Foobooks app - delete this and replace with your own info. If one operation is performed multiple times (e.g. Read), you only need to provide 1 example.*

__Create__
  + Visit http://laravel.ceeker.me/player/5/add
  + Fill out form
  + Click *Add player*
  + Player will be shown on the next page
  
__Read__
  + Visit http://laravel.ceeker.me/tennis see all available courts
  
__Update__
  + Visit http://laravel.ceeker.me/tennis/5/edit; choose the Edit button
  + Make some edit to form
  + Click *Save changes*
  + Observe confirmation message
  
__Delete__
  + Visit <http://laravel.ceeker.me/tennis/5/delete>; 
  + Confirm deletion
  + Observe confirmation message

## Outside resources

## Code style divergences

## Notes for instructor
There are two tables, and each table has a few columns.The challenging parts is to real time adding players on the page of the other table. During the development, many small bugs took long time to solve. One thing I want to share is when the controller has two update methods, the route for each method has to be different. This seems minor, but in order to find the bug, one needs to know the how form submission work behind the scene. The skelepton is similar to foodbooks without adding many more css features, but still, it is a challenging process. 
