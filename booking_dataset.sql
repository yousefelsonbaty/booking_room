-- Create the Student table
CREATE TABLE Student (
  userID INT PRIMARY KEY,
  Email VARCHAR(100),
  Password VARCHAR(100),
  firstName VARCHAR(50),
  lastName VARCHAR(50)
);

-- Create the Phones table
CREATE TABLE Phones (
  phoneID INT PRIMARY KEY,
  phoneNumber VARCHAR(15)
);

-- Create the UserPhones table
CREATE TABLE UserPhones (
  userID INT,
  phoneID INT,
  FOREIGN KEY (userID) REFERENCES Student(userID),
  FOREIGN KEY (phoneID) REFERENCES Phones(phoneID)
);

-- Create the Booking table
CREATE TABLE Booking (
  bookingID INT PRIMARY KEY,
  userID INT,
  Purpose VARCHAR(100),
  Date DATE,
  startTime VARCHAR(10),
  endTime VARCHAR(10),
  FOREIGN KEY (userID) REFERENCES Student(userID)
);

-- Create the Room table
CREATE TABLE Room (
  roomID INT PRIMARY KEY,
  userID INT,
  roomNo VARCHAR(10),
  Location VARCHAR(100),
  Availability VARCHAR(20),
  FOREIGN KEY (userID) REFERENCES Student(userID)
);

-- Create the sensorReadings table
CREATE TABLE sensorReadings (
  dataID INT PRIMARY KEY,
  userID INT,
  roomID INT,
  Motion BOOLEAN,
  comfortLevel INT,
  Humidity INT,
  airQuality INT,
  Temperature DECIMAL(5, 2),
  FOREIGN KEY (userID) REFERENCES Student(userID),
  FOREIGN KEY (roomID) REFERENCES Room(roomID)
);

-- Insert data into the Student table
INSERT INTO Student (userID, Email, Password, firstName, lastName)
VALUES
  (1, 'john@email.com', 'password123', 'John', 'Doe'),
  (2, 'sarah@email.com', 'abc123', 'Sarah', 'Smith'),
  (3, 'mike@email.com', 'qwerty456', 'Mike', 'Johnson');

-- Insert data into the Phones table
INSERT INTO Phones (phoneID, phoneNumber)
VALUES
  (1, '1234567890'),
  (2, '9876543210'),
  (3, '5555555555'),
  (4, '6666666666');

-- Insert data into the UserPhones table
INSERT INTO UserPhones (userID, phoneID)
VALUES
  (1, 1),
  (1, 2),
  (2, 3),
  (3, 4);

-- Insert data into the Booking table
INSERT INTO Booking (bookingID, userID, Purpose, Date, startTime, endTime)
VALUES
  (1, 1, 'Meeting', '2024-04-06', '09:00 AM', '11:00 AM'),
  (2, 2, 'Presentation', '2024-04-07', '02:00 PM', '04:00 PM'),
  (3, 3, 'Discussion', '2024-04-08', '10:30 AM', '12:30 PM');

-- Insert data into the Room table
INSERT INTO Room (roomID, userID, roomNo, Location, Availability)
VALUES
  (1, 1, '101', 'Building A', 'Available'),
  (2, 2, '102', 'Building A', 'Reserved'),
  (3, 3, '203', 'Building B', 'Available');

-- Insert data into the sensorReadings table
INSERT INTO sensorReadings (dataID, userID, roomID, Motion, comfortLevel, Humidity, airQuality, Temperature)
VALUES
  (1, 1, 1, true, 5, 40, 70, 22.5),
  (2, 1, 2, false, 3, 55, 80, 19.8),
  (3, 2, 2, true, 4, 50, 75, 21.2),
  (4, 3, 3, true, 5, 45, 85, 23.0);

