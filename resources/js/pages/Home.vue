<template>
  <div class="home-container">
    <section class="hero">
      <div class="hero-text container">
        <div class="row">
          <div class="col text-description">
            <h4>Art By</h4>
            <hr />
            <h2>
             Davidel <br />
              Paula
            </h2>
            <hr />
          </div>
          <div class="col slider-description">
              <div class="slider"> 
                  <span style="--i:1;"><img :src="'/images/paintings/painting_1.jpg'" alt=""></span>
                  <span style="--i:2;"><img :src="'/images/paintings/painting_2.jpg'" alt=""></span>
                  <span style="--i:3;"><img :src="'/images/paintings/painting_3.jpg'" alt=""></span>
                  <span style="--i:4;"><img :src="'/images/paintings/painting_4.jpg'" alt=""></span>
                  <span style="--i:5;"><img :src="'/images/paintings/painting_5.jpg'" alt=""></span>
                  <span style="--i:6;"><img :src="'/images/paintings/painting_6.jpg'" alt=""></span>
                  <span style="--i:7;"><img :src="'/images/paintings/painting_7.jpg'" alt=""></span>
                  <span style="--i:8;"><img :src="'/images/paintings/painting_8.png'" alt=""></span>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
// @ is an alias to /src
export default {
  name: "Home",
  components: {},
};
</script>

<style lang="scss" scoped>
.hero {
  .hero-text {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: black;

    h4 {
      font-family: 'Righteous', sans-serif;
      text-transform: uppercase;
      font-size: 22px;
      padding-bottom: 4px;
    }
    h2 {
      font-family: 'Nunito', sans-serif;
      font-size: 50px;
      @media (min-width: 550px) {
        font-size: 80px;
      }
    }
    hr:nth-child(2) {
      max-width: 365px;
      margin-bottom: 16px;
    }
    hr:nth-child(4) {
      height: 6px;
      background-color: #fff;
      border: none;
      max-width: 85px;
      margin-top: 16px;
    }
  }
}
</style>