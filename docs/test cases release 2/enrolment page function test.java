package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.testng.annotations.*;
import static org.testng.Assert.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class EnrolmentPageFunction {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @BeforeClass(alwaysRun = true)
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://pinelands-music.tk/music_school/home.php";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testEnrolmentPageFunction() throws Exception {
    driver.get(baseUrl + "/music_school/home.php");
    driver.findElement(By.linkText("Enrolment")).click();
    driver.findElement(By.name("firstName")).clear();
    driver.findElement(By.name("firstName")).sendKeys("chris");
    driver.findElement(By.name("lastName")).clear();
    driver.findElement(By.name("lastName")).sendKeys("gyeong");
    driver.findElement(By.name("dob")).clear();
    driver.findElement(By.name("dob")).sendKeys("15/05/1999");
    driver.findElement(By.name("street")).clear();
    driver.findElement(By.name("street")).sendKeys("magaret");
    driver.findElement(By.name("suburb")).clear();
    driver.findElement(By.name("suburb")).sendKeys("brisbane");
    new Select(driver.findElement(By.name("state"))).selectByVisibleText("QLD");
    driver.findElement(By.cssSelector("div.iradio_square-blue.hover > ins.iCheck-helper")).click();
    driver.findElement(By.name("postCode")).clear();
    driver.findElement(By.name("postCode")).sendKeys("4000");
    driver.findElement(By.name("phoneNumber")).clear();
    driver.findElement(By.name("phoneNumber")).sendKeys("0412735850");
    driver.findElement(By.name("email")).clear();
    driver.findElement(By.name("email")).sendKeys("kyungheesuk@naver.com");
    new Select(driver.findElement(By.name("preferredDay"))).selectByVisibleText("Wednesday");
    driver.findElement(By.name("preferredTime")).clear();
    driver.findElement(By.name("preferredTime")).sendKeys("6pm");
    driver.findElement(By.name("preferredTeacher")).clear();
    driver.findElement(By.name("preferredTeacher")).sendKeys("mike");
    driver.findElement(By.cssSelector("div.iradio_square-blue.hover > ins.iCheck-helper")).click();
    driver.findElement(By.name("preferredLanguage")).clear();
    driver.findElement(By.name("preferredLanguage")).sendKeys("korean");
    driver.findElement(By.name("submit")).click();
  }

  @AfterClass(alwaysRun = true)
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
