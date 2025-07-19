<?php

declare(strict_types=1);

return [
    // Weekly Team Standup (Meeting ID 1)
    ['meeting_id' => 1, 'user_id' => 2, 'role' => 'organizer'], // John Doe
    ['meeting_id' => 1, 'user_id' => 3, 'role' => 'participant'], // Alice Smith
    ['meeting_id' => 1, 'user_id' => 4, 'role' => 'participant'], // Bob Wilson
    ['meeting_id' => 1, 'user_id' => 6, 'role' => 'participant'], // David Lee
    ['meeting_id' => 1, 'user_id' => 7, 'role' => 'participant'], // Emily Miller

    // Project Kickoff Meeting (Meeting ID 2)
    ['meeting_id' => 2, 'user_id' => 1, 'role' => 'organizer'], // Admin
    ['meeting_id' => 2, 'user_id' => 2, 'role' => 'participant'], // John Doe
    ['meeting_id' => 2, 'user_id' => 5, 'role' => 'participant'], // Carol Johnson
    ['meeting_id' => 2, 'user_id' => 3, 'role' => 'participant'], // Alice Smith
    ['meeting_id' => 2, 'user_id' => 4, 'role' => 'participant'], // Bob Wilson

    // Q3 Planning Session (Meeting ID 3)
    ['meeting_id' => 3, 'user_id' => 5, 'role' => 'organizer'], // Carol Johnson
    ['meeting_id' => 3, 'user_id' => 1, 'role' => 'participant'], // Admin
    ['meeting_id' => 3, 'user_id' => 2, 'role' => 'participant'], // John Doe
    ['meeting_id' => 3, 'user_id' => 6, 'role' => 'participant'], // David Lee

    // Client Presentation (Meeting ID 4)
    ['meeting_id' => 4, 'user_id' => 2, 'role' => 'organizer'], // John Doe
    ['meeting_id' => 4, 'user_id' => 3, 'role' => 'presenter'], // Alice Smith
    ['meeting_id' => 4, 'user_id' => 7, 'role' => 'presenter'], // Emily Miller
    ['meeting_id' => 4, 'user_id' => 5, 'role' => 'participant'], // Carol Johnson

    // Code Review Session (Meeting ID 5)
    ['meeting_id' => 5, 'user_id' => 3, 'role' => 'organizer'], // Alice Smith
    ['meeting_id' => 5, 'user_id' => 4, 'role' => 'participant'], // Bob Wilson
    ['meeting_id' => 5, 'user_id' => 6, 'role' => 'participant'], // David Lee
    ['meeting_id' => 5, 'user_id' => 7, 'role' => 'participant'], // Emily Miller
    ['meeting_id' => 5, 'user_id' => 8, 'role' => 'observer'], // Frank Garcia

    // Monthly All-Hands (Meeting ID 6)
    ['meeting_id' => 6, 'user_id' => 1, 'role' => 'organizer'], // Admin
    ['meeting_id' => 6, 'user_id' => 2, 'role' => 'participant'], // John Doe
    ['meeting_id' => 6, 'user_id' => 3, 'role' => 'participant'], // Alice Smith
    ['meeting_id' => 6, 'user_id' => 4, 'role' => 'participant'], // Bob Wilson
    ['meeting_id' => 6, 'user_id' => 5, 'role' => 'participant'], // Carol Johnson
    ['meeting_id' => 6, 'user_id' => 6, 'role' => 'participant'], // David Lee
    ['meeting_id' => 6, 'user_id' => 7, 'role' => 'participant'], // Emily Miller
    ['meeting_id' => 6, 'user_id' => 8, 'role' => 'participant'], // Frank Garcia

    // Training Workshop (Meeting ID 7)
    ['meeting_id' => 7, 'user_id' => 5, 'role' => 'organizer'], // Carol Johnson
    ['meeting_id' => 7, 'user_id' => 3, 'role' => 'trainer'], // Alice Smith
    ['meeting_id' => 7, 'user_id' => 4, 'role' => 'participant'], // Bob Wilson
    ['meeting_id' => 7, 'user_id' => 6, 'role' => 'participant'], // David Lee
    ['meeting_id' => 7, 'user_id' => 7, 'role' => 'participant'], // Emily Miller
    ['meeting_id' => 7, 'user_id' => 8, 'role' => 'participant'], // Frank Garcia
];