
/// <reference types="cypress"/> 
describe("Envia un hi",()=>{
    it("Contacto",()=>{
        cy.visit('contacto')
        cy.get('[data-cy="name"]').should('exist')
        .invoke("attr","type").should("equal",'text')

        cy.get('[data-cy="name"]').type('Joan')
        cy.get('[data-cy="mensaje"]').type('Mensajes')
        cy.get('[data-cy="options"]').select("compra")
        cy.get("[data-cy='input-precio']").type(500000)
        cy.get('[data-cy="input-contacto"]').eq(0).check();
        cy.get('[data-cy="phone-number"]').should('exist').type(35115542)
        cy.get('[data-cy="date"]').type("2022-07-01")
        cy.get('[data-cy="hour"]').type("09:18")
        cy.get('[data-cy="form-contacto"]').submit()
        cy.get('[data-cy="submit-msg"]').should('exist')
        .invoke("text").should("equal","Enviado correctamente");
    })
})