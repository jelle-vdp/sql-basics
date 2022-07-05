# SQL introduction
Description: an exercise on working with MYSQL databases for the BeCode webdevelopment course. 

- Repository: `n/a` (so no repo)
- Type of Challenge: `Learning`
- Duration: `1 day`
- Team challenge : `solo`

## The Mission

### 🌱 Must-have features

> You'll find that a lot of these tasks can be performed with MySQL queries and through your database manager. In time, you'll discover what works best for each task. A `*` means you should use a query for this.

1. Get familiar with the basics of MYSQL and set up a database
2. Make the following tables and populate them with some dummy data (have at least two entries for every table)
    - groups: id, name, location, start_date, max_participants
    - learners: id, name, email, active
    - coaches: id, name
3. Try the following selects
    - Get all data from the groups<sup>\*</sup>
    - Get the name and email of the first learner, and alias the name to learner_name<sup>\*</sup> 
4. 💩 happens - a group needs to be postponed
    - Update the start date of the first_group (make it two months later)<sup>\*</sup>
    - Introduce a new field `status` which can contain a long text indicating the reason for postponing (bonus points if it's a creative one)
5. One of the learners changed his/her mind and decided to be an astronaut
    - Delete someone from the learners table<sup>\*</sup>

### 🌼 Nice to have (doable)

6. A learner belongs to a group, and a group has a coach
    - Find a technique to make this connection in the database (what of the field is unique to a record, so we can refer to it?)
7. We want all the data
    - Select a coach and all related groups<sup>\*</sup>
    - Select all the above, but also all learners from this group who are still active<sup>\*</sup>
    
### 🌳 Nice to have (hard)

Bonus round: try some steps again, but this time run your SQL from PHP.
You'll need to connect PHP to the database first. What techniques can you find to do so? Why do you choose one or another? Don't overthink the structure at this point, one file is enough.

Enjoy the ride! Don't forget to look back at what you've achieved so far every once in a while - you'll be old before you know 🙃
![](https://media.giphy.com/media/2nJgpMuR2fVn2/giphy.gif)
