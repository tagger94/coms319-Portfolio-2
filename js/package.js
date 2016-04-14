/*global faker*/

function Package (sender, reciever, weight, volume, user, date) {
    this.sender = sender;
    this.reciever = reciever;
    this.weight = weight;
    this.volume = volume;
    this.user = user;
    this.timeline = [];
    this.timeline[0] = new Activity("Package Dropped Off:", "Home", date);
}

//Container for Activities
function Activity (activity, warehouse, date) {
    this.message = activity;
    this.warehouse = warehouse;
    this.date = date;
}

//Container for Package info
function Address (name, address1, city, state, zip) {
    this.name = name;
    this.address1 = address1;
    this.city = city;
    this.state = state;
    this.zip = zip;
}

function createNewRandomPackage() {
    
    var sender = new Address(faker.name.findName(), 
                            faker.address.streetAddress(), 
                            faker.address.city(),
                            faker.address.state(),
                            faker.address.zipCode());
                            
    var reciever = new Address(faker.name.findName(), 
                            faker.address.streetAddress(), 
                            faker.address.city(),
                            faker.address.state(),
                            faker.address.zipCode());
                            
    var weight = faker.random.number(200);
    var volume = faker.random.number(200);
    
    return new Package(sender, reciever, weight, volume, "tagger94");
}