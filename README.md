
## Getting Started

This simple web application lets you store on a database all the words that can be generated from 90 password-allowed chars in a 10 chars long word. You can make multiple machines generate parts of this dictionary by simply making them run a JS script.
That is just sample code of an easy, working version.
I will probably upload a cleaner version capable of generating words from 10 to 20 chars long. 
You can decrypt an HASH by submitting it into the main php page. 
In case of missing plain-text match the software will submit the hash to a remote db in order to get a result.

### Prerequisites

* [WebServer](https://httpd.apache.org/) - A good and secure webserver in order to host our webapp
* [MySQL Database](https://www.mysql.com/it/) - A good DBMS

### Installing

1) Copy the whole repository into a webserver accessible path
2) Import the SQL file "hashnetdb.sql" into your database, a new db called "hashnet" will be created
3) Test the software by visiting the web page "min.html" and then "index.php"

## Future implementations

* Project Cleanup
* Code Improvement
* Upgrading words computing capacity up to 20 chars

## License

This project is licensed under the GNU General Public License v3.0 - see the [LICENSE.md](LICENSE.md) file for details
