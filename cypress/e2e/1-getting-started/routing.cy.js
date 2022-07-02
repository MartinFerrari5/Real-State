/// <reference types="cypress"/> 
describe("Navegacion y Routing del Header y Footer",()=>{
    it("Prueba index",()=>{
        cy.visit('index')
        cy.get("[data-cy='barra']").should("exist")
        .find("a").eq(0)
        .should("exist")
        .invoke("attr","href")
        .should('equal','nosotros')

        cy.get("[data-cy='barra-footer']").should("exist")
        .find("a").eq(0)
        .should("exist")
        .invoke("attr","href")
        .should('equal','nosotros')
    })

})