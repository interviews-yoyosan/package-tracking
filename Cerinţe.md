# Problemă

Please implement a system:
* where people can enter a shipping tracking code in a form
* as a result, they will see an estimated delivery date.
* The frontend is supposed to be connecting to the backend through a REST API.
* Please make sure that the data store in the backend can be replaced (e.g by a config).
  * Implement two storage solutions that can be plugged in.
  * Suggestions for data stores to implement are SQLite and file (CSV).

# Tasks breakdown

- [X] Create model, controller, migration and seeder.
- [X] Implement needed REST API methods.
- [ ] Make storage flexible.
- [ ] Implement front-end using Vue.js.
- [ ] Connect front-end to the backend.

# Expectations

* Feel free to use libraries, when it makes sense.
* Please be careful about unit tests, commits and all those other pesky details. They matter!
* Deliver the results as a git repository with commit history.
* The implementation should be done in a half day (4h).

# Cateva observatii
* Testul are si componenta de frontend care ar trebui dezvoltata cu AngularJS, dar pentru ca tu nu mergi pe rolul de fullstack, dezvolti doar ce stii.
* Estimatele de livrare sunt fictive, pe noi ne intereseaza cele doua medii de stocare si cum faci tu switch-ul.
* Trebuie sa vedem ca produsul X, o sa fie livrat la data Y. Nu cautam ceva foarte complex, dupa cum ai vazut, timpul estimat de executare este undeva la 4h.
* Daca ai intrebari sau nelamuriri, te rog sa-mi scrii.
* De asemenea, as vrea sa imi oferi un feedback asupra testului si sa-mi confirmi daca DL ramane pentru ziua de luni :)